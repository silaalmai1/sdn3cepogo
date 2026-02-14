<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    // Admin - Display all gallery
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    // Admin - Show create form
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Admin - Store gallery item
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('galeri', 'public');
            $validated['gambar'] = $gambarPath;
        }

        Galeri::create($validated);

        return redirect('/admin/galeri')->with('success', 'Galeri ditambahkan!');
    }

    // Admin - Show edit form
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    // Admin - Update gallery item
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($galeri->gambar && file_exists(storage_path('app/public/' . $galeri->gambar))) {
                unlink(storage_path('app/public/' . $galeri->gambar));
            }
            $gambarPath = $request->file('gambar')->store('galeri', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $galeri->update($validated);

        return redirect('/admin/galeri')->with('success', 'Galeri diperbarui!');
    }

    // Admin - Delete gallery item
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Delete image
        if ($galeri->gambar && file_exists(storage_path('app/public/' . $galeri->gambar))) {
            unlink(storage_path('app/public/' . $galeri->gambar));
        }

        $galeri->delete();

        return redirect('/admin/galeri')->with('success', 'Galeri dihapus!');
    }

    // Public - Show gallery page
    public function showPublic()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('galeri', compact('galeris'));
    }
}
