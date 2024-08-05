<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return self::dataTable();
        }
        return view('bank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:banks',
        ]);

        $bank = Bank::create($validatedData);

        return redirect()->route('bank.index')
            ->with('success', 'Bank berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        return view('bank.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:banks,nama,' . $bank->id,
        ]);

        $bank->update($validatedData);

        return redirect()->route('bank.index')
            ->with('success', 'Bank berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('bank.index')
            ->with('success', 'Bank berhasil dihapus.');
    }

    public static function dataTable()
    {
        $data = Bank::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $editUrl = route('bank.edit', $row->id);
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
