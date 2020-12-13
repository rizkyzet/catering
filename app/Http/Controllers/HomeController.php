<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('kiddos', 'detailMenu');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function kiddos()
    {

        $kategori = \App\Kategori::all();
        return view('kiddos', ['kategori' => $kategori]);
    }

    public function detailMenu($slug)
    {
        $menu = \App\Menu::where('slug', $slug)->firstOrFail();
        return view('detail-menu', ['menu' => $menu]);
    }
}
