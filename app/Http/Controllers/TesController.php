<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class TesController extends Controller
{
    public function index(Request $request)
    {
        \Cart::session()->add(array(
            array(
                'id' => 456,
                'name' => 'Sample Item 1',
                'price' => 67.99,
                'quantity' => 4,
                'attributes' => array()
            ),
            array(
                'id' => 568,
                'name' => 'Sample Item 2',
                'price' => 69.25,
                'quantity' => 4,
                'attributes' => array(
                    'size' => 'L',
                    'color' => 'blue'
                )
            ),
        ));

        $items = \Cart::getContent();

        dd($items);
    }
}
