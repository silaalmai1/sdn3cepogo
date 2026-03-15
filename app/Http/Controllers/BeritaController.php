<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function showPublic()
    {
        $beritas = Berita::where('is_published', true)
            ->orderByDesc('tanggal_publikasi')
            ->latest()
            ->get();

        return view('berita', compact('beritas'));
    }

    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $title = 'Poster Bulletin ' . now()->format('YmdHis');

        $validated['judul'] = $title;
        $validated['slug'] = $this->generateUniqueSlug($title);
        $validated['ringkasan'] = null;
        $validated['konten'] = '';
        $validated['tanggal_publikasi'] = now()->toDateString();
        $validated['is_published'] = true;

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $validated['gambar'] = $file->storeAs('beritas', $filename, 'public');

        Berita::create($validated);

        return redirect('/admin/berita')->with('success', 'Poster berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $validated['judul'] = $berita->judul ?: 'Poster Bulletin ' . now()->format('YmdHis');
        $validated['slug'] = $this->generateUniqueSlug($validated['judul'], $berita->id);
        $validated['ringkasan'] = null;
        $validated['konten'] = $berita->konten ?? '';
        $validated['tanggal_publikasi'] = $berita->tanggal_publikasi?->toDateString() ?? now()->toDateString();
        $validated['is_published'] = true;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $validated['gambar'] = $file->storeAs('beritas', $filename, 'public');
        }

        $berita->update($validated);

        return redirect('/admin/berita')->with('success', 'Poster berita berhasil diubah');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect('/admin/berita')->with('success', 'Poster berita berhasil dihapus');
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (Berita::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
