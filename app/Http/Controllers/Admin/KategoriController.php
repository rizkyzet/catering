<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama' => 'required|unique:kategori,nama'
        ]);

        $attr['slug'] = Str::slug($request->nama);

        Kategori::create($attr);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {

        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $attr = $request->validate([
            'nama' => 'required|unique:kategori,nama,' . $kategori->id . 'id'
        ]);
        $attr['slug'] = Str::slug($request->nama);

        $kategori->update($attr);
        if ($kategori->wasChanged()) {

            return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Diubah!');
        } else {
            return redirect()->route('kategori.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        // $kategori->sub_kategori()->delete();
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Dihapus!');
    }
}
