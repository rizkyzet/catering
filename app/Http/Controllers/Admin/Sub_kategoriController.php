<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Sub_kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Sub_kategoriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_kategori = Sub_kategori::all();
        return view('admin/sub_kategori/index', compact('sub_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = \App\Kategori::all();
        return view('admin/sub_kategori/create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = \App\Kategori::find($request->id_kategori);


        $attr = $request->validate([
            'nama' => [
                'required',
                Rule::unique('sub_kategori')->where(function ($query) use ($request) {
                    return $query->where('id_kategori', $request->id_kategori);
                })
            ],
            'id_kategori' => [
                'required'
            ]
        ]);

        $attr['slug'] = Str::slug($request->nama . '-' . $kategori->nama);

        Sub_kategori::create($attr);
        return redirect()->route('sub_kategori.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sub_kategori  $sub_kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_kategori $sub_kategori)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub_kategori  $sub_kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_kategori $sub_kategori)
    {
        $kategori = Kategori::all();
        return view('admin.sub_kategori.edit', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sub_kategori  $sub_kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub_kategori $sub_kategori)
    {
        $kategori = \App\Kategori::find($request->id_kategori);
        $attr = $request->validate([
            'nama' => [
                'required',
                Rule::unique('sub_kategori')->where(function ($query) use ($request) {
                    return $query->where('id_kategori', $request->id_kategori);
                })->ignore($sub_kategori->id, 'id')
            ],
            'id_kategori' => [
                'required'
            ]
        ]);

        $attr['slug'] = Str::slug($request->nama . '-' . $kategori->nama);
        $sub_kategori->update($attr);
        if ($sub_kategori->wasChanged()) {

            return redirect()->route('sub_kategori.index')->with('success', 'Data Berhasil Diubah!');
        } else {
            return redirect()->route('sub_kategori.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub_kategori  $sub_kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_kategori $sub_kategori)
    {
        $sub_kategori->delete();
        return redirect()->route('sub_kategori.index')->with('success', 'Data Berhasil Ditambahkan!');
    }
}
