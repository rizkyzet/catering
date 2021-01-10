<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class MenuEdit extends Component
{
    use WithFileUploads;

    public $id_kategori;
    public $id_sub_kategori;
    public $nama;
    public $foto;
    public $deskripsi;
    public $harga;

    public $menu;
    public $sub_kategori;
    public $kategori;


    public function mount($menu)
    {
        $this->menu = $menu;
        $this->kategori = \App\Kategori::all();
        $this->id_kategori = old('id_kategori', $menu->sub_kategori->kategori->id);
        $this->sub_kategori = \App\Sub_kategori::where('id_kategori', $this->id_kategori)->get();
        $this->id_sub_kategori = old('id_sub_kategori', $menu->sub_kategori->id);
        $this->nama = old('nama', $menu->nama);
        $this->deskripsi = old('deskripsi', $menu->deskripsi);
        $this->harga = old('harga', $menu->harga);
    }

    public function updatedIdKategori()
    {
        $this->id_sub_kategori = '';
        $this->sub_kategori = \App\Sub_kategori::where('id_kategori', $this->id_kategori)->get();
    }

    public function render()
    {

        return view('livewire.admin.menu-edit');
    }
}
