<?php

namespace App\Http\Livewire\Home;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Menu;

class HomeSelectMenu extends Component
{
    use WithPagination;

    public $idKategori = 'all';
    public $idSubKategori = 'all';


    public function AddToCart($menu_id)
    {

        if (!Auth::check()) {

            $this->dispatchBrowserEvent('alertLogin', ['value' => route('login')]);
            // session()->flash('success', 'Anda harus login!');
            // return redirect()->to('/login');
        } else {

            $menu = Menu::find($menu_id);
            $userID = Auth::user()->id;
            \Cart::session($userID)->add([
                'id' => $menu->id,
                'name' => $menu->nama,
                'price' => $menu->harga,
                'quantity' => 1,
                'attributes' => [
                    'foto' => $menu->foto
                ],
            ]);

            $quantity = \Cart::session($userID)->getTotalQuantity();

            $this->dispatchBrowserEvent('alert', ['qty' => $quantity]);
        }
    }

    public function updatedIdKategori($value)
    {
        $this->resetPage();
        $this->idSubKategori = 'all';
    }

    public function updatedIdSubKategori()
    {
        $this->resetPage();
    }

    public function render()
    {


        $kategori = \App\Kategori::all();

        if ($this->idKategori == 'all') {

            $this->idSubKategori = 'all';
        }


        if ($this->idKategori == 'all' && $this->idSubKategori == 'all') {
            $this->idSubKategori = 'all';
            $sub_kategori = [];
            $menu = Menu::paginate(4);
        } else {

            $sub_kategori = \App\Sub_kategori::where('id_kategori', $this->idKategori)->get();

            if ($this->idSubKategori == 'all') {
                foreach ($sub_kategori as $s) {
                    $where_sub[] = $s->id;
                };
                $menu = Menu::whereIn('id_sub_kategori', $where_sub)->paginate(4);
            } else {
                $menu = Menu::where('id_sub_kategori', $this->idSubKategori)->paginate(4);
            }
        }



        return view('livewire.home.home-select-menu', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori, 'menu' => $menu]);
    }
}
