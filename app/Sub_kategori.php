<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_kategori extends Model
{
    protected $table = 'sub_kategori';
    protected $fillable = ['nama', 'slug', 'id_kategori'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'id_sub_kategori');
    }
}
