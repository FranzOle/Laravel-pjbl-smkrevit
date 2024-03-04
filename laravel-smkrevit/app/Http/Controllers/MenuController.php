<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategoris = Kategori::all();
        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')->select(['menus.*','kategoris.*']) -> paginate(3);
        return view('Backend.menu.select',['menus' => $menus,'kategoris' => $kategoris]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategoris = Kategori::all();
        return view('Backend.menu.insert', ['kategoris' => $kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request-> validate([
            'gambar' => 'required|max:20048',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required'
        ]);
        $id = $request -> idkategori;
        $namaGambar = $request->file('gambar')->getCLientOriginalName();
        // echo $namaGambar;
        $request-> gambar-> move(public_path('gambar'), $namaGambar);
        Menu::create([
            'idkategori' => $id,
            'menu' => $data['menu'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
            'gambar' => $namaGambar,
        ]);

        return redirect('admin\menu');
    }

    /**
     * Display the specified resource.
     */
    public function show($idmenu)
    {
        //
        Menu::where('idmenu', '=', $idmenu) -> delete();
        return redirect('admin/menu');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idmenu)
    {
        //
        $kategoris = Kategori::all();
        $menu = Menu::where('idmenu', $idmenu) -> first();

        return view('Backend.menu.update',['menu' => $menu, 'kategoris' => $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idmenu)
    {
        //
        // dd($request -> input());
        if (isset($request->gambar)) {
            // echo 'update';
            $namaGambar = $request->file('gambar')->getCLientOriginalName();
            $data = $request-> validate([
                'gambar' => 'required|max:20048',
                'menu' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required'
            ]);

            Menu::where('idmenu',$idmenu)->update([
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga'],
                'gambar' => $namaGambar,
            ]);

            $request-> gambar-> move(public_path('gambar'), $namaGambar);

        } else {
            $data = $request-> validate([
                // 'gambar' => 'required|max:20048',
                'menu' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required'
            ]);

            Menu::where('idmenu', $idmenu) -> update([
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga']
            ]);
        }

        return redirect('admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function select(Request $request) {
        // echo 'select';
        $id = $request -> idkategori;
        $kategoris = Kategori::all();

        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')
        ->select(['menus.*', 'kategoris.*'])
        ->where('menus.idkategori', $id)
        ->paginate(3);
        return view('Backend.menu.select',['menus'=>$menus,'kategoris'=>$kategoris]);
    }
}
