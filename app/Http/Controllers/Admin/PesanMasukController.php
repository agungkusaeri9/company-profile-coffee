<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanMasuk;
use Illuminate\Http\Request;

class PesanMasukController extends Controller
{
    public function index()
    {
        $items = PesanMasuk::latest()->get();
        return view('admin.pages.pesan_masuk.index',[
            'title' => 'Pesan Masuk',
            'items' => $items
        ]);
    }

    public function destroy($id)
    {
        PesanMasuk::destroy($id);
        return redirect()->back()->with('success','Pesan Masuk berhasil dihapus');
    }
}
