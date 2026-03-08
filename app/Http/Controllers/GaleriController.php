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
        $tipe = $request->input('tipe', 'foto');
        $videoSumber = $request->input('video_sumber', 'url');

        $rules = [
            'kategori'     => 'required|string',
            'tipe'         => 'required|in:foto,video',
            'video_sumber' => 'nullable|in:file,url',
        ];

        if ($tipe === 'foto') {
            $rules['gambar'] = 'required|image|mimes:jpeg,png,jpg,gif|max:5120';
        } elseif ($videoSumber === 'file') {
            $rules['video_file'] = 'required|file|mimes:mp4,mov,avi,mkv,webm|max:512000';
        } else {
            $rules['video_url'] = 'required|url';
        }

        $validated = $request->validate($rules);

        // Handle file upload for photo
        if ($tipe === 'foto' && $request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        // Handle video
        if ($tipe === 'video') {
            if ($videoSumber === 'file' && $request->hasFile('video_file')) {
                $validated['video_file'] = $request->file('video_file')->store('galeri/video', 'public');
                $validated['video_sumber'] = 'file';
            } elseif ($videoSumber === 'url') {
                $validated['video_sumber'] = 'url';
            }
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
        $tipe = $request->input('tipe', $galeri->tipe ?? 'foto');
        $videoSumber = $request->input('video_sumber', $galeri->video_sumber ?? 'url');

        $rules = [
            'kategori'     => 'required|string',
            'tipe'         => 'required|in:foto,video',
            'video_sumber' => 'nullable|in:file,url',
        ];

        if ($tipe === 'foto') {
            $rules['gambar'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120';
        } elseif ($videoSumber === 'file') {
            $rules['video_file'] = 'nullable|file|mimes:mp4,mov,avi,mkv,webm|max:512000';
        } else {
            $rules['video_url'] = 'required|url';
        }

        $validated = $request->validate($rules);

        if ($tipe === 'foto' && $request->hasFile('gambar')) {
            if ($galeri->gambar && file_exists(storage_path('app/public/' . $galeri->gambar))) {
                unlink(storage_path('app/public/' . $galeri->gambar));
            }
            $validated['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        if ($tipe === 'video' && $videoSumber === 'file' && $request->hasFile('video_file')) {
            if ($galeri->video_file && file_exists(storage_path('app/public/' . $galeri->video_file))) {
                unlink(storage_path('app/public/' . $galeri->video_file));
            }
            $validated['video_file'] = $request->file('video_file')->store('galeri/video', 'public');
            $validated['video_sumber'] = 'file';
            $validated['gambar'] = null;
        } elseif ($tipe === 'video' && $videoSumber === 'url') {
            $validated['video_sumber'] = 'url';
            $validated['gambar'] = null;
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

        // Delete video file
        if ($galeri->video_file && file_exists(storage_path('app/public/' . $galeri->video_file))) {
            unlink(storage_path('app/public/' . $galeri->video_file));
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
