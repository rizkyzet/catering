<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['nama', 'foto', 'slug', 'deskripsi', 'harga', 'id_sub_kategori'];

    public function sub_kategori()
    {
        return $this->belongsTo(Sub_kategori::class, 'id_sub_kategori');
    }

    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'id_menu');
    }
}
