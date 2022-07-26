<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $items = Produk::orderBy('nama_produk','asc')->get();
        return view('admin.pages.produk.index',[
            'title' => 'Data Produk',
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
        $kategori_produk = KategoriProduk::orderBy('nama_kategori','ASC')->get();
        return view('admin.pages.produk.create',[
            'title' => 'Tambah Produk',
            'kategori_produk' => $kategori_produk
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
            'nama_produk' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required','image']
        ]);
        $data = request()->all();
        $data['gambar'] = request('gambar')->store('produk','public');
        $data['slug'] = Str::slug(request('nama_produk'));
        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success','Produk berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategori_produk = KategoriProduk::orderBy('nama_kategori','ASC')->get();
        return view('admin.pages.produk.edit',[
            'title' => 'Edit Produk ' . $produk->nama_produk,
            'item' => $produk,
            'kategori_produk' => $kategori_produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['image']
        ]);
        $data = request()->all();
        if(request('gambar'))
        {
            Storage::disk('public')->delete($produk->gambar);
            $data['gambar'] = request('gambar')->store('produk','public');
        }else{
            $data['gambar'] = $produk->gambar;
        }
        $data['slug'] = Str::slug(request('nama_produk'));
        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success','Produk berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success','Produk berhasil dihapus!');
    }
}
