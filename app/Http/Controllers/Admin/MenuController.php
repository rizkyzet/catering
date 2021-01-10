<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Menu;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('calendar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        $menu = Menu::all();




        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        $kategori = \App\Kategori::all();
        $sub_kategori = \App\Kategori::all();

        return view('admin.menu.create', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $attr = $request->validate([
            'id_kategori' => ['required'],
            'id_sub_kategori' => ['required'],
            'nama' => [
                'required',
                Rule::unique('menu')->where(function ($query) use ($request) {
                    return $query->where('id_sub_kategori', $request->id_sub_kategori);
                })
            ],
            'harga' => ['required'],
            'foto' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:2048'],
            'deskripsi' => ['required'],
        ]);
        $sub_kategori = \App\Sub_kategori::find($request->id_sub_kategori);
        $foto = $request->file('foto');
        // $pathToFile = Storage::disk('public')->put('uploads', $foto);
        // $uploadedFileUrl = Cloudinary::upload($foto->getRealPath())->getSecurePath();
        $result = $request->file('foto')->storeOnCloudinary('KiddosMenu');
        $pathToFile = $result->getSecurePath();
        $slug = Str::slug($request->nama . '-sub-kategori-' . $sub_kategori->nama);
        unset($attr['id_kategori']);
        $attr['foto'] = $pathToFile;
        $attr['slug'] = $slug;

        Menu::create($attr);

        return redirect()->route('menu.index')->with('success', 'Data Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // dd($menu->updateMedia());
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if ($request->file('foto')) {

            $attr = $request->validate([
                'id_kategori' => ['required'],
                'id_sub_kategori' => ['required'],
                'nama' => [
                    'required',
                    Rule::unique('menu')->where(function ($query) use ($request) {
                        return $query->where('id_sub_kategori', $request->id_sub_kategori);
                    })->ignore($menu->id)
                ],
                'harga' => ['required'],
                'foto' => ['image', 'mimes:jpeg,jpg,png,svg', 'max:2048'],
                'deskripsi' => ['required'],
            ]);

            $result = $request->file('foto')->storeOnCloudinary('KiddosMenu');
            $pathToFile = $result->getSecurePath();
            $attr['foto'] = $pathToFile;
        } else {
            $attr = $request->validate([
                'id_kategori' => ['required'],
                'id_sub_kategori' => ['required'],
                'nama' => [
                    'required',
                    Rule::unique('menu')->where(function ($query) use ($request) {
                        return $query->where('id_sub_kategori', $request->id_sub_kategori);
                    })->ignore($menu->id)
                ],
                'harga' => ['required'],
                'deskripsi' => ['required'],
            ]);
        }
        $sub_kategori = \App\Sub_kategori::find($request->id_sub_kategori);
        $slug = Str::slug($request->nama . '-sub-kategori-' . $sub_kategori->nama);
        unset($attr['id_kategori']);
        $attr['slug'] = $slug;

        $menu->update($attr);

        if ($menu->wasChanged()) {
            return redirect()->route('menu.index')->with('success', 'Data Berhasil Diubah!');
        } else {
            return redirect()->route('menu.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $this->authorize('admin');
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
