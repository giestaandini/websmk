<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('user_id', auth()->user()->id)->get();

        return response()->view('backend.berita.index', compact('berita'))->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('backend.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'status' => 'required|in:draft,published,archived'
        ]);

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('public/berita', $fileName);
            $validatedData['foto'] = $fileName;
        } else {
            $validatedData['foto'] = null;
        }

        $kategori = Kategori::find($validatedData['kategori_id']);

        Berita::create([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'foto' => $validatedData['foto'],
            'kategori_id' => $kategori->id,
            'user_id' => auth()->user()->id,
            'status' => $validatedData['status'],
            'published_at' => $validatedData['status'] === 'published' ? now() : null,
        ]);

        $kategori->increment('jumlah_berita');

        return redirect()->route('beritaback')->with('success', 'Menambahkan Berita Berhasil');
    }

    public function edit(string $id)
    {
        $berita = Berita::findOrfail($id);

        $kategori = Kategori::all();

        return view('backend.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'status' => 'required|in:draft,published,archived'
        ]);
    
        $berita = Berita::findOrFail($id);
        $kategori = Kategori::find($validatedData['kategori_id']);
    
        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::delete('public/berita/' . $berita->foto);
            }
    
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('public/berita', $fileName);
            $validatedData['foto'] = $fileName;
        } else {
            $validatedData['foto'] = $berita->foto;
        }
    
        $berita->update([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'foto' => $validatedData['foto'],
            'kategori_id' => $kategori->id,
            'user_id' => auth()->user()->id,
            'status' => $validatedData['status'],
            'published_at' => $validatedData['status'] === 'published' ? now() : null,
        ]);
    
        return redirect()->route('beritaback')->with('success', 'Merubah Berita Berhasil');
    }
    
    public function show(string $id)
    {
        $berita = Berita::findOrfail($id);

        $kategori = $berita->kategori;

        return view('backend.berita.show', compact('berita', 'kategori'));
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto) {
            Storage::delete('public/berita/' . $berita->foto);
        }

        $kategori = Kategori::find($berita->kategori_id);
        
        $berita->delete();

        if ($kategori) {
            $kategori->decrement('jumlah_berita');
        }

        return redirect()->route('beritaback')->with('success', 'Berita Berhasil Dihapus!');
    }

    public function berita()
    {
        $berita = Berita::latest()->take(4)->get();

        return view('frontend.index', compact('berita'));
    }

    public function post()
    {
        $berita = Berita::latest()->paginate(8);

        return view('frontend.berita', compact('berita'));
    }

    public function detail(string $id)
    {
        $berita = Berita::findOrfail($id);

        $kategori = $berita->kategori;

        return view('frontend.detail', compact('berita', 'kategori'));
    }
}
