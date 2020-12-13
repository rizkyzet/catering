<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{

    protected $cart = [];
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];
    public $quantityRow;





    public function updatingQuantityRow($value, $id)
    {


        \Cart::session(Auth::user()->id)->update($id, array(

            'quantity' => [
                'relative' => false,
                'value' => $value
            ]
        ));
        $totqty = \Cart::session(Auth::user()->id)->getTotalQuantity();
        $this->dispatchBrowserEvent('cart-icon', ['qty' => $totqty]);
    }

    public function deleteCart($id)
    {
        \Cart::session(Auth::id())->remove($id);
    }


    public function kurangCart($id)
    {

        \Cart::session(Auth::user()->id)->update($id, array(
            'quantity' => -1,
        ));
        $qty = \Cart::get($id)->quantity;
        $this->quantityRow[$id] = $qty;

        $totqty = \Cart::session(Auth::user()->id)->getTotalQuantity();
        $this->dispatchBrowserEvent('cart-icon', ['qty' => $totqty]);
    }
    public function tambahCart($id)
    {

        \Cart::session(Auth::user()->id)->update($id, array(
            'quantity' => 1,
        ));
        $qty = \Cart::get($id)->quantity;
        $this->quantityRow[$id] = $qty;

        $totqty = \Cart::session(Auth::user()->id)->getTotalQuantity();
        $this->dispatchBrowserEvent('cart-icon', ['qty' => $totqty]);
    }

    public function render()
    {

        if (Auth::check()) {

            $this->cart = \Cart::session(Auth::user()->id)->getContent()->sortBy('id');
        } else {
            $this->cart = [];
        }
        return view('livewire.home.cart', ['cart' => $this->cart]);
    }
}
