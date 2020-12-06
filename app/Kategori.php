<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama', 'slug'];

    public function sub_kategori()
    {
        return $this->hasMany(Sub_kategori::class, 'id_kategori');
    }
}
