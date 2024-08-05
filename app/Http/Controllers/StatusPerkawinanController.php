<?php

namespace App\Http\Controllers;

use App\Models\StatusPerkawinan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StatusPerkawinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return self::dataTable();
        }
        return view('status_perkawinan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('status_perkawinan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:status_perkawinans',
        ]);

        $status_perkawinan = StatusPerkawinan::create($validatedData);

        return redirect()->route('status_perkawinan.index')
            ->with('success', 'StatusPerkawinan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusPerkawinan $status_perkawinan)
    {
        return view('status_perkawinan.show', compact('status_perkawinan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusPerkawinan $status_perkawinan)
    {
        return view('status_perkawinan.edit', compact('status_perkawinan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusPerkawinan $status_perkawinan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:status_perkawinans,nama,' . $status_perkawinan->id,
        ]);

        $status_perkawinan->update($validatedData);

        return redirect()->route('status_perkawinan.index')
            ->with('success', 'StatusPerkawinan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusPerkawinan $status_perkawinan)
    {
        $status_perkawinan->delete();

        return redirect()->route('status_perkawinan.index')
            ->with('success', 'StatusPerkawinan berhasil dihapus.');
    }

    public static function dataTable()
    {
        $data = StatusPerkawinan::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $editUrl = route('status_perkawinan.edit', $row->id);
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
