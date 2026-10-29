<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GuruController extends Controller
{
    public function index(): View
    {
        $guru = DB::table('guru')->orderBy('id', 'asc')->get();
        return view('guru.index', compact('guru'));
    }

    public function create(): View
    {
        return view('guru.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50|unique:guru,nip',
            'jenis_kelamin' => 'nullable|in:L,P',
            'nomor_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
        ]);

        DB::table('guru')->insert([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/guru')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit(string $id): View
    {
        $guru = DB::table('guru')->where('id', $id)->first();
        if (!$guru) {
            abort(404, 'Data guru tidak ditemukan.');
        }
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50|unique:guru,nip,'.$id,
            'jenis_kelamin' => 'nullable|in:L,P',
            'nomor_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
        ]);

        DB::table('guru')->where('id', $id)->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'updated_at' => now(),
        ]);

        return redirect('/guru')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(string $id): RedirectResponse
    {
        DB::table('guru')->where('id', $id)->delete();
        return redirect('/guru')->with('success', 'Data guru berhasil dihapus!');
    }
}