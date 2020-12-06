<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Kategori;

class MenuCreate extends Component
{

    public $id_kategori = '';
    public $id_sub_kategori = '';

    public function mount($id_kategori, $id_sub_kategori)
    {
        $this->id_kategori = $id_kategori;
        $this->id_sub_kategori = $id_sub_kategori;
    }


    public function render()
    {
        $kategori = \App\Kategori::all();
        if ($this->id_kategori) {
            $sub_kategori = \App\Sub_kategori::where('id_kategori', $this->id_kategori)->get();
        } else {
            $sub_kategori = [];
        };

        return view('livewire.admin.menu-create', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori]);
    }
}
