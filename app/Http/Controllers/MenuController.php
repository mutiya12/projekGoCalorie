<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
    	$user = Auth::user();



        $resto = \App\Outlet::where('user_id','=',$user->id)->first();

        if ($resto->isverify == "no") {
        	$status = "belum";
        }else{
        	$status = "sudah";
        }

    	$menu = \App\Menu::where('restoran_id','=',$resto->id)->get();
    	return view('menu.index',compact('menu','status'));
    }
    public function form()
    {
    	return view('menu.form');
    }
    public function store(Request $req)
    {
        $a1 = $req->file('gambar')->getClientOriginalName();
        if ((strpos($a1, "JPG") || strpos($a1, "png") || strpos($a1, "jpeg") || strpos($a1, "jpg")) == false) {
            return redirect()->back()->with('gagal','File harus berupa png, jpg, jpeg');
        }else{
    	$user = Auth::user();
        $resto = \App\Outlet::where('user_id','=',$user->id)->first();

        $tempatfile = ('images');

        $gbrMakanan = $req->file('gambar');
        $nama_GbrMakanan = $gbrMakanan->getClientOriginalName();
        $gbrMakanan->move($tempatfile, $nama_GbrMakanan);

        $o = new \App\Menu;
        $o->restoran_id = $resto->id;
        $o->gambar = $nama_GbrMakanan;
        $o->nama_makanan = $req->nama;
        $o->harga_makanan = $req->harga;

        $o->save();


    	return redirect('/menu-makanan');
    }
    }
    public function lokasiTinjau()
    {
        $lokasiTinjau = \App\Outlet::where('isverify','=','yes')->get();
        return view('tinjau.index',compact('lokasiTinjau'));
    }
    public function menuOnId($id)
    {
        $menu = \App\Menu::where('restoran_id','=',$id)->get();
        return view('tinjau.listmenu',compact('menu'));
    }
    public function menuShow($id)
    {
        $menu = \App\Menu::where('id','=',$id)->first();
        return view('tinjau.isikalori',compact('menu'));
    }
    public function storeKalori(Request $req)
    {
        \App\Menu::where('id','=',$req->idnya)
            ->update([
                'kalori' => $req->kalori, 
                'protein' => $req->protein, 
                'lemak' => $req->lemak, 
                'karbohidrat' => $req->karbohidrat
            ]);
        return redirect()->back()->with('sukses','Berhasil Mengubah Data');
    }
    public function editMenuResto($id)
    {
        $menu = \App\Menu::where('id','=',$id)->first();
        return view('menu.edit',compact('menu'));
    }
    public function updatesNow(Request $req)
    {
        $a1 = $req->file('gambar')->getClientOriginalName();
        if ((strpos($a1, "JPG") || strpos($a1, "png") || strpos($a1, "jpeg") || strpos($a1, "jpg")) == false) {
            return redirect()->back()->with('gagal','File harus berupa png, jpg, jpeg');
        }else{

        if (empty($req->file('gambar'))) {
             \App\Menu::where('id','=',$req->idnya)
                ->update([
                    'nama_makanan' => $req->nama,
                    'harga_makanan' => $req->harga,
                ]);
            return redirect()->back()->with('sukses','berhasil mengubah data menu'); 
        }else{
            $tempatfile = ('images');

            $gbrMakanan = $req->file('gambar');
            $nama_GbrMakanan = $gbrMakanan->getClientOriginalName();
            $gbrMakanan->move($tempatfile, $nama_GbrMakanan);

            \App\Menu::where('id','=',$req->idnya)
                ->update([
                    'nama_makanan' => $req->nama,
                    'harga_makanan' => $req->harga,
                    'gambar' => $nama_GbrMakanan,
                ]);
            return redirect()->back()->with('sukses','berhasil mengubah data menu');    
            }
        }
    }
}
