<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kematian;

class KematianController extends Controller
{
    // Menampilkan data kematian
    public function index()
    {
        $kematian = Kematian::all();
        return view('kematian.index', compact('kematian'));
    }

    // Menampilkan form untuk membuat data kematian baru
    public function create()
    {
        return view('kematian.create');
    }

    // Menyimpan data kematian baru ke database
    public function store(Request $request)
    {
        // Validasi data inputan
        $validatedData = $request->validate([
            'nik' => 'required|max:16',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_kematian' => 'required|date',
            'tanggal_lahir' => 'required|date',
            'tempat_kematian' => 'required|max:255',
            'penyebab_kematian' => 'required|max:255',

        ]);

        // Simpan data ke database
        $kematian = Kematian::create($validatedData);

        // Redirect ke halaman daftar kematian
        return redirect('kematian')->with('success', 'Data kematian berhasil disimpan');
    }

    // Menampilkan form untuk mengedit data kematian
    public function edit($id)
    {
        $kematian = Kematian::findOrFail($id);
        return view('kematian.edit', compact('kematian'));
    }

    // Menyimpan perubahan data kematian ke database
    public function update(Request $request, $id)
    {
        // Validasi data inputan
        $validatedData = $request->validate([
            'nik' => 'required|max:16',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_kematian' => 'required|date',
            'tanggal_lahir' => 'required|date',
            'tempat_kematian' => 'required|max:255',
            'penyebab_kematian' => 'required|max:255',
        ]);

        // Simpan perubahan data ke database
        Kematian::whereId($id)->update($validatedData);

        // Redirect ke halaman daftar kematian
        return redirect('/kematian')->with('success', 'Data kematian berhasil diperbarui');
    }

    // Menghapus data kematian dari database
    public function destroy($id)
    {
        $kematian = Kematian::findOrFail($id);
        $kematian->delete();

        // Redirect ke halaman daftar kematian
        return redirect('/kematian')->with('success', 'Data kematian berhasil dihapus');
    }
}
