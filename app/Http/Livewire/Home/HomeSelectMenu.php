<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class HomeSelectMenu extends Component
{

    public $idKategori = 'all';
    public $id_sub_kategori = 'all';




    public function updatedIdKategori($value)
    {
        $this->id_sub_kategori = 'all';
    }

    public function render()
    {

        $kategori = \App\Kategori::all();

        if ($this->idKategori == 'all') {

            $this->id_sub_kategori = 'all';
        }

        if ($this->idKategori == 'all' && $this->id_sub_kategori == 'all') {
            $this->id_sub_kategori = 'all';
            $sub_kategori = [];
            $menu = \App\Menu::all();
        } else {

            $sub_kategori = \App\Sub_kategori::where('id_kategori', $this->idKategori)->get();

            if ($this->id_sub_kategori == 'all') {
                foreach ($sub_kategori as $s) {
                    $where_sub[] = $s->id;
                };
                $menu = \App\Menu::whereIn('id_sub_kategori', $where_sub)->get();
            } else {
                $menu = \App\Menu::where('id_sub_kategori', $this->id_sub_kategori)->get();
            }
        }



        return view('livewire.home.home-select-menu', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori, 'menu' => $menu]);
    }
}
