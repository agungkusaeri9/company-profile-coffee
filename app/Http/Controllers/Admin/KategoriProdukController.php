<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $product_categories = KategoriProduk::orderBy('nama_kategori','asc')->get();
        return view('admin.pages.kategori_produk.index',[
            'title' => 'Data Kategori Produk',
            'product_categories' => $product_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kategori_produk.create',[
            'title' => 'Tambah Kategori Produk'
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
            'nama_kategori' => ['required'],
            'deskripsi_singkat' => ['required'],
        ]);
        $data = request()->all();
        $data['slug'] = Str::slug(request('nama_kategori'));
        KategoriProduk::create($data);

        return redirect()->route('admin.kategori-produk.index')->with('success','Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        return view('admin.pages.kategori_produk.edit',[
            'title' => 'Edit Kategori Produk ' . $kategoriProduk->nama_kategori,
            'item' => $kategoriProduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $request->validate([
            'nama_kategori' => ['required'],
            'deskripsi_singkat' => ['required'],
        ]);
        $data = request()->all();
        $data['slug'] = Str::slug(request('nama_kategori'));
        $kategoriProduk->update($data);

        return redirect()->route('admin.kategori-produk.index')->with('success','Kategori berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProduk $KategoriProduk)
    {
        $KategoriProduk->delete();
        return redirect()->route('admin.kategori-produk.index')->with('success','Kategori Produk berhasil dihapus!');
    }
}
