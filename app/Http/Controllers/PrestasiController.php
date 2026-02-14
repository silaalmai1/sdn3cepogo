<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    // Admin - List Prestasi
    public function index()
    {
        $prestasis = Prestasi::all();
        return view('admin.prestasi.index', compact('prestasis'));
    }

    // Admin - Create Form
    public function create()
    {
        return view('admin.prestasi.create');
    }

    // Admin - Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tingkat' => 'required|string|max:100',
            'tahun' => 'required|integer',
            'deskripsi_singkat' => 'required|string',
            'deskripsi_lengkap' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('prestasis', $filename, 'public');
            $validated['gambar'] = $path;
        }

        Prestasi::create($validated);

        return redirect('/admin/prestasi')->with('success', 'Prestasi berhasil ditambahkan');
    }

    // Admin - Edit Form
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    // Admin - Update
    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tingkat' => 'required|string|max:100',
            'tahun' => 'required|integer',
            'deskripsi_singkat' => 'required|string',
            'deskripsi_lengkap' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($prestasi->gambar && Storage::disk('public')->exists($prestasi->gambar)) {
                Storage::disk('public')->delete($prestasi->gambar);
            }

            // Upload file baru
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('prestasis', $filename, 'public');
            $validated['gambar'] = $path;
        }

        $prestasi->update($validated);

        return redirect('/admin/prestasi')->with('success', 'Prestasi berhasil diubah');
    }

    // Admin - Delete
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        
        // Hapus file gambar jika ada
        if ($prestasi->gambar && Storage::disk('public')->exists($prestasi->gambar)) {
            Storage::disk('public')->delete($prestasi->gambar);
        }
        
        $prestasi->delete();

        return redirect('/admin/prestasi')->with('success', 'Prestasi berhasil dihapus');
    }

    // Public - List Prestasi
    public function showPublic()
    {
        $prestasis = Prestasi::all();
        return view('prestasi', compact('prestasis'));
    }

    // Public - Detail Prestasi
    public function showDetail($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->firstOrFail();
        return view('prestasi-detail-public', compact('prestasi'));
    }
}
