<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\SubDivisi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $divisis = Divisi::select(['id', 'nama'])->get();
        if ($request->ajax()) {
            return self::dataTable();
        }
        return view('sub_divisi.index', compact('divisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sub_divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:sub_divisis',
        ]);

        $sub_divisi = SubDivisi::create($validatedData);

        return redirect()->route('sub_divisi.index')
            ->with('success', 'SubDivisi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubDivisi $sub_divisi)
    {
        return view('sub_divisi.show', compact('sub_divisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubDivisi $sub_divisi)
    {
        return view('sub_divisi.edit', compact('sub_divisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubDivisi $sub_divisi)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:sub_divisis,nama,' . $sub_divisi->id,
        ]);

        $sub_divisi->update($validatedData);

        return redirect()->route('sub_divisi.index')
            ->with('success', 'SubDivisi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubDivisi $sub_divisi)
    {
        $sub_divisi->delete();

        return redirect()->route('sub_divisi.index')
            ->with('success', 'SubDivisi berhasil dihapus.');
    }

    public static function dataTable()
    {
        $data = SubDivisi::with('divisi')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('divisi_nama', function ($row) {
                return $row->divisi->nama;
            })
            ->addColumn('tindakan', function ($row) {
                $editUrl = route('sub_divisi.edit', $row->id);
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
