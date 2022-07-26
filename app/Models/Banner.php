<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $guarded = ['id'];

    public function gambar()
    {
        return asset('storage/'. $this->gambar);
    }

    public function background()
    {
        return asset('storage/'. $this->background);
    }
}
