<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar siswa dari database menggunakan Query Builder
     */
    public function index(): View
    {
        $siswa = DB::table('siswa')
            ->leftJoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
            ->select('siswa.*', 'jurusan.nama_jurusan')
            ->orderBy('siswa.id', 'asc')
            ->get();

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Menampilkan form tambah siswa baru
     */
    public function create(): View
    {
        $jurusan = DB::table('jurusan')->orderBy('nama_jurusan', 'asc')->get();

        return view('siswa.create', compact('jurusan'));
    }

    /**
     * Menyimpan data siswa baru ke database menggunakan Query Builder
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'nis' => 'nullable|string|max:50|unique:siswa,nis',
            'nisn' => 'nullable|string|max:50|unique:siswa,nisn',
            'jenis_kelamin' => 'nullable|in:L,P',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'nomor_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'tanggal_masuk' => 'nullable|date',
        ]);

        DB::table('siswa')->insert([
            'jurusan_id' => $request->jurusan_id,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'tanggal_masuk' => $request->tanggal_masuk,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit siswa berdasarkan ID menggunakan Query Builder
     */
    public function edit(string $id): View
    {
        $siswa = DB::table('siswa')->where('id', $id)->first();

        if (! $siswa) {
            abort(404, 'Data siswa tidak ditemukan.');
        }

        $jurusan = DB::table('jurusan')->orderBy('nama_jurusan', 'asc')->get();

        return view('siswa.edit', compact('siswa', 'jurusan'));
    }

    /**
     * Memperbarui data siswa di database menggunakan Query Builder
     */
    public function prosesEdit(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'nis' => 'nullable|string|max:50|unique:siswa,nis,'.$id,
            'nisn' => 'nullable|string|max:50|unique:siswa,nisn,'.$id,
            'jenis_kelamin' => 'nullable|in:L,P',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'nomor_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'tanggal_masuk' => 'nullable|date',
        ]);

        DB::table('siswa')->where('id', $id)->update([
            'jurusan_id' => $request->jurusan_id,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'tanggal_masuk' => $request->tanggal_masuk,
            'updated_at' => now(),
        ]);

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Menghapus data siswa dari database menggunakan Query Builder
     */
    public function prosesHapus(string $id): RedirectResponse
    {
        DB::table('siswa')->where('id', $id)->delete();

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}