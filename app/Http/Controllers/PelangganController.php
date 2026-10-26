<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.form');
    }

    public function store(Request $request)
    {
        Pelanggan::create($this->validasi($request));
        return redirect()->route('pelanggan.index');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.form', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($this->validasi($request));
        return redirect()->route('pelanggan.index');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index');
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama'    => 'required|string|max:255',
            'alamat'  => 'required|string|max:255',
            'notelp'  => 'required|string|max:20',
            'catatan' => 'nullable|string|max:255',
        ]);
    }
}
