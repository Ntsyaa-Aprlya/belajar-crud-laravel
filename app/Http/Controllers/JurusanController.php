<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class JurusanController extends Controller
{
    /**
     * Menampilkan daftar jurusan dari database
     */
    public function index(): View
    {
        // Mengambil semua baris data dari tabel jurusan diurutkan berdasarkan id
        $jurusan = DB::table('jurusan')->orderBy('id', 'asc')->get();

        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Menampilkan form tambah jurusan baru
     */
    public function create(): View
    {
        return view('jurusan.create');
    }

    /**
     * Menyimpan data jurusan baru ke database
     */
    public function prosesSimpan(Request $request): RedirectResponse
    {
        // 1. Validasi input
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
        ]);

        // 2. Insert ke database
        DB::table('jurusan')->insert([
            'nama_jurusan' => $request->nama_jurusan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Redirect kembali ke index dengan pesan sukses
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit jurusan berdasarkan ID
     */
    public function edit(string $id): View
    {
        // Cari data berdasarkan ID
        $jurusan = DB::table('jurusan')->where('id', $id)->first();

        // Jika data tidak ditemukan, tampilkan halaman error 404
        if (! $jurusan) {
            abort(404, 'Data jurusan tidak ditemukan.');
        }

        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Memperbarui data jurusan di database
     */
    public function prosesEdit(Request $request, string $id): RedirectResponse
    {
        // 1. Validasi input
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
        ]);

        // 2. Update baris data berdasarkan ID
        DB::table('jurusan')->where('id', $id)->update([
            'nama_jurusan' => $request->nama_jurusan,
            'updated_at' => now(),
        ]);

        // 3. Redirect kembali ke index dengan notifikasi
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil diperbarui!');
    }

    /**
     * Menghapus data jurusan dari database
     */
    public function prosesHapus(string $id): RedirectResponse
    {
        // Hapus baris data berdasarkan ID
        DB::table('jurusan')->where('id', $id)->delete();

        // Redirect kembali ke index dengan notifikasi
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil dihapus!');
    }
}