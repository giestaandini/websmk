<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        
        return response()->view('backend.kategori.index', compact('kategori'))->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function create()
    {
        return view('backend.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Kategori::create([
            'name' => $validated['name'],
            'jumlah_berita' => 0,
        ]);
        
        return redirect()->route('kategori')->with('success', 'Kategori Berhasil Ditambahkan');
    }
    
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrfail($id);

        $kategori->delete();

        return redirect()->route('kategori')->with('success', 'Kategori Berhasil Dihapus');
    }
}
