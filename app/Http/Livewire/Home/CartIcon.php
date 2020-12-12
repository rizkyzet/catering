<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class CartIcon extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
        $this->dispatchBrowserEvent('alert', ['value' => 'berhasil']);
    }

    public function render()
    {
        return view('livewire.home.cart-icon');
    }
}
