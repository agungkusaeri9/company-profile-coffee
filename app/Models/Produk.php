<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class,'kategori_id','id');
    }

    public function gambar()
    {
        return asset('storage/' . $this->gambar);
    }
}
