<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return self::dataTable();
        }
        return view('level.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:levels',
        ]);

        $level = Level::create($validatedData);

        return redirect()->route('level.index')
            ->with('success', 'Level berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return view('level.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        return view('level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:levels,nama,' . $level->id,
        ]);

        $level->update($validatedData);

        return redirect()->route('level.index')
            ->with('success', 'Level berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('level.index')
            ->with('success', 'Level berhasil dihapus.');
    }

    public static function dataTable()
    {
        $data = Level::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $editUrl = route('level.edit', $row->id);
                return '
                    <div class="btn-group" role="group" aria-label="Action Buttons">
                        <a href="' . $editUrl . '" class="btn btn-secondary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row->id . '" data-nama="' . $row->nama . '">Hapus</button>
                    </div>
                ';
            })
            ->rawColumns(['tindakan'])
            ->make(true);
    }
}
