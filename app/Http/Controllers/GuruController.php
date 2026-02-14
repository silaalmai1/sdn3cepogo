<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    // Public - List Guru
    public function showPublic()
    {
        $gurus = Guru::all();
        return view('guru', compact('gurus'));
    }

    // Admin - List Guru
    public function index()
    {
        $gurus = Guru::all();
        return view('admin.guru.index', compact('gurus'));
    }

    // Admin - Create Form
    public function create()
    {
        return view('admin.guru.create');
    }

    // Admin - Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus',
            'posisi' => 'required|string|max:100',
            'mata_pelajaran' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('gurus', $filename, 'public');
            $validated['foto'] = $path;
        }

        Guru::create($validated);

        return redirect('/admin/guru')->with('success', 'Guru berhasil ditambahkan');
    }

    // Admin - Edit Form
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    // Admin - Update
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus,nip,' . $id,
            'posisi' => 'required|string|max:100',
            'mata_pelajaran' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Upload file baru
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('gurus', $filename, 'public');
            $validated['foto'] = $path;
        }

        $guru->update($validated);

        return redirect('/admin/guru')->with('success', 'Guru berhasil diubah');
    }

    // Admin - Delete
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus file foto jika ada
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect('/admin/guru')->with('success', 'Guru berhasil dihapus');
    }
}
