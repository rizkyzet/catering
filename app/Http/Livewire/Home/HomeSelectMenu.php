<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Livewire\WithPagination;
use App\Menu;

class HomeSelectMenu extends Component
{
    use WithPagination;

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
            $menu = Menu::paginate(4);
        } else {

            $sub_kategori = \App\Sub_kategori::where('id_kategori', $this->idKategori)->get();

            if ($this->id_sub_kategori == 'all') {
                foreach ($sub_kategori as $s) {
                    $where_sub[] = $s->id;
                };
                $menu = Menu::whereIn('id_sub_kategori', $where_sub)->paginate(4);
            } else {
                $menu = Menu::where('id_sub_kategori', $this->id_sub_kategori)->paginate(4);
            }
        }



        return view('livewire.home.home-select-menu', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori, 'menu' => $menu]);
    }
}
