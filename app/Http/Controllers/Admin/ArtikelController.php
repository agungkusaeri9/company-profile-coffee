<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $items = Artikel::orderBy('judul','asc')->get();
        return view('admin.pages.artikel.index',[
            'title' => 'Data Artikel',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.artikel.create',[
            'title' => 'Tambah Artikel',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required','image']
        ]);

        $data = $request->all();
        $data['gambar'] = request('gambar')->store('artikel','public');
        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success','Artikel berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $item = Artikel::findOrFail($id);
        return view('admin.pages.artikel.edit',[
            'title' => 'Edit Artikel ' . $item->name,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['image']
        ]);
        $item = Artikel::findOrFail($id);
        $data = $request->all();
        if(request('gambar'))
        {
            $data['gambar'] = request('gambar')->store('artikel','public');
        }else{
            $data['gambar'] = $item->gambar;
        }

        $item->update($data);

        return redirect()->route('admin.artikel.index')->with('success','Artikel berhasil diubah!');
    }


    public function destroy($id)
    {
        $item = Artikel::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.artikel.index')->with('success','Artikel berhasil dihapus!');
    }
}
