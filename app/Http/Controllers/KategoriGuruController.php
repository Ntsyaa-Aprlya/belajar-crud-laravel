<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KategoriGuruController extends Controller
{
    public function index(): View
    {
        // Pengecekan aman langsung ke database
        $kategoriGurus = DB::table('kategori_guru')->get();
        return view('kategori_guru.index', compact('kategoriGurus'));
    }

    public function create(): View
    {
        return view('kategori_guru.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        DB::table('kategori_guru')->insert([
            'nama_kategori' => $request->nama_kategori,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kategori_guru.index')
                         ->with('success', 'Kategori Guru berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $kategoriGuru = DB::table('kategori_guru')->where('id', $id)->first();
        return view('kategori_guru.edit', compact('kategoriGuru'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        DB::table('kategori_guru')->where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'updated_at' => now(),
        ]);

        return redirect()->route('kategori_guru.index')
                         ->with('success', 'Kategori Guru berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        DB::table('kategori_guru')->where('id', $id)->delete();

        return redirect()->route('kategori_guru.index')
                         ->with('success', 'Kategori Guru berhasil dihapus.');
    }
}