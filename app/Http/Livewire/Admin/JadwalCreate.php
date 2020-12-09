<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Menu;
use App\Jadwal;

class JadwalCreate extends Component
{

    public $tanggal;
    public $id_menu;

    public function updated($value)
    {
        $this->validateOnly($value, [
            'tanggal' => 'unique:jadwal,tanggal',
            'id_menu' => 'required'

        ]);
    }

    public function saveJadwal()
    {
        $validatedData = $this->validate([
            'tanggal' => 'required|unique:jadwal,tanggal',
            'id_menu' => 'required',
        ]);

        Jadwal::create($validatedData);
        session()->flash('success', 'Jadwal berhasil ditambah');
        return redirect()->route('jadwal.index');
    }

    public function render()
    {
        $menu = Menu::all();
        return view('livewire.admin.jadwal-create', ['menu' => $menu]);
    }
}
