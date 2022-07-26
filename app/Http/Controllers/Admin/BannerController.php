<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $items = Banner::orderBy('id','desc')->get();
        return view('admin.pages.banner.index',[
            'title' => 'Data Banner',
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
        return view('admin.pages.banner.create',[
            'title' => 'Tambah Produk'
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
            'background' => ['required','image'],
            'deskripsi_singkat' => ['required'],
            'status' => ['required'],
            'judul' => ['required'],
            'sub_judul' => ['required'],
            'gambar' => ['required','image']
        ]);
        $data = request()->all();
        $data['background'] = request('background')->store('banner','public');
        $data['gambar'] = request('gambar')->store('banner','public');
        Banner::create($data);

        return redirect()->route('admin.banner.index')->with('success','Banner berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.pages.banner.edit',[
            'title' => 'Edit Produk ' . $banner->judul,
            'item' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'background' => ['image'],
            'deskripsi_singkat' => ['required'],
            'status' => ['required'],
            'judul' => ['required'],
            'sub_judul' => ['required'],
            'gambar' => ['image']
        ]);
        $data = request()->all();
        if(request('background'))
        {
            Storage::disk('public')->delete($banner->background);
            $data['background'] = request('background')->store('banner','public');
        }else{
            $data['background'] = $banner->background;
        }
        if(request('gambar'))
        {
            Storage::disk('public')->delete($banner->gambar);
            $data['gambar'] = request('gambar')->store('banner','public');
        }else{
            $data['gambar'] = $banner->gambar;
        }

        $banner->update($data);

        return redirect()->route('admin.banner.index')->with('success','Banner berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success','Banner berhasil dihapus!');
    }
}
