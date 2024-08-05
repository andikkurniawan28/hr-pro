<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return self::dataTable();
        }
        return view('agama.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:agamas',
        ]);

        $agama = Agama::create($validatedData);

        return redirect()->route('agama.index')
            ->with('success', 'Agama berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agama $agama)
    {
        return view('agama.show', compact('agama'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agama $agama)
    {
        return view('agama.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agama $agama)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:agamas,nama,' . $agama->id,
        ]);

        $agama->update($validatedData);

        return redirect()->route('agama.index')
            ->with('success', 'Agama berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agama $agama)
    {
        $agama->delete();

        return redirect()->route('agama.index')
            ->with('success', 'Agama berhasil dihapus.');
    }

    public static function dataTable()
    {
        $data = Agama::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $editUrl = route('agama.edit', $row->id);
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
