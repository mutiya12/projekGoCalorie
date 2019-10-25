<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AhliGiziController extends Controller
{
    public function index()
    {
    	$ahligizi = \App\AhliGizi::All();	
    	return view('ahligizi.index',compact('ahligizi'));
    }
    public function form()
    {
    	return view('ahligizi.form');
    }
    public function create(Request $req)
    {
    	$u = new \App\User;
    	$u->id = mt_rand(1000,9999);
    	\App\AhliGizi::create([
    		'user_id' => $u->id,
    		'nama_lengkap' => $req->nama_lengkap,
    		'lulusan' => $req->lulusan
    	]);
    	$u->role = "ahli gizi";
    	$u->name = $req->nama_lengkap;
    	$u->email = $req->email;
    	$u->password = bcrypt('secret');

    	$u->save();

    	return redirect('/ahli-gizi');
    }
}
