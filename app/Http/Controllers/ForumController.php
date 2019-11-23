<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $artikel = \App\Artikel::orderBy('updated_at','DESC')->get();
    	return view('article.index', compact('artikel'));
    }
    public function form()
    {
    	return view('article.form');
    }
    public function formPost(Request $req)
    {
        $userid = Auth::user()->id;
        $a = new \App\Artikel;
        $a->artikelid = mt_rand(1000,9999);
        $a->penulis_id = $userid;
        $a->judul = $req->judul;
        $a->isi = $req->isi;

        $a->save();

    	return redirect('/artikel-dan-tips');
    }
    public function detail($id)
    {
    	$artikel = \App\Artikel::where('artikelid','=',$id)->first();
        return view('article.detail',compact('artikel'));
    }
    public function edit($id)
    {
        $artikel = \App\Artikel::where('artikelid','=',$id)->first();
        return view('article.edit',compact('artikel'));
    }
    public function update(Request $req)
    {
        \App\Artikel::where('artikelid','=',$req->idartikel)
            ->update([
                'isi' => $req->artikel
            ]);
        return redirect('/artikel-dan-tips');
    }
    public function delete($id)
    {
        \App\Artikel::where('artikelid','=',$id)->delete();
        return redirect()->back()->with('sukses','berhasi menghapus artikel');
    }
}
