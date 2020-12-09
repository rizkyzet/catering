<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table  = 'jadwal';
    protected $fillable = ['tanggal', 'id_menu'];


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
