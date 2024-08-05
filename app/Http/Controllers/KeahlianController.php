<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return self::dataTable();
        }
        return view('keahlian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keahlian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:keahlians',
        ]);

        $keahlian = Keahlian::create($validatedData);

        return redirect()->route('keahlian.index')
            ->with('success', 'Keahlian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keahlian $keahlian)
    {
        return view('keahlian.show', compact('keahlian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keahlian $keahlian)
    {
        return view('keahlian.edit', compact('keahlian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keahlian $keahlian)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:keahlians,nama,' . $keahlian->id,
        ]);

        $keahlian->update($validatedData);

        return redirect()->route('keahlian.index')
            ->with('success', 'Keahlian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keahlian $keahlian)
    {
        $keahlian->delete();

        return redirect()->route('keahlian.index')
            ->with('success', 'Keahlian berhasil dihapus.');
    }

    public static function dataTable()
    {
        $data = Keahlian::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $editUrl = route('keahlian.edit', $row->id);
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
