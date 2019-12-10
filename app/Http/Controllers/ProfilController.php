<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function resto()
    {
    	$userid = Auth::user()->id;
    	$resto = \App\Outlet::where('user_id','=',$userid)->first();	
    	return view('profil.resto', compact('resto'));
    }
    public function editResto(Request $req)
    {
    	if (empty($req->p2)) {
			\App\Outlet::where('id','=',$req->idnya)
	    		->update([
	    			'name' => $req->name,
	    		]);	
	    	\App\User::where('id','=',$req->idUser)
	    		->update([
	    			'email' => $req->email,
	    			'name' => $req->name,    			
	    		]);	
	    	return redirect()->back()->with('sukses','Berhasil mengubah data profil');
    	}else{
    		if ($req->p1==$req->p2) {
				\App\Outlet::where('id','=',$req->idnya)
		    		->update([
		    			'name' => $req->name,
		    		]);	
		    	\App\User::where('id','=',$req->idUser)
		    		->update([
		    			'email' => $req->email,
		    			'name' => $req->name,
		    			'password' => bcrypt($req->p2),    			
	    		]);	
	    		return redirect()->back()->with('sukses','Berhasil mengubah data profil');
    		}
    		else{
    			return redirect()->back()->with('gagal','Password tidak sesuai');
    		}
    	}
    	
    	
    }
    public function ahliGizi()
    {
    	$userid = Auth::user()->id;
    	$ahli = \App\AhliGizi::where('user_id','=',$userid)->first();
    	return view('profil.ahli', compact('ahli'));
    }
    public function editAhliGizi(Request $req)
    {
    	if (empty($req->p2)) {
			\App\AhliGizi::where('id','=',$req->idnya)
	    		->update([
	    			'nama_lengkap' => $req->name,
	    		]);	
	    	\App\User::where('id','=',$req->idUser)
	    		->update([
	    			'email' => $req->email,
	    			'name' => $req->name,    			
	    		]);	
	    	return redirect()->back()->with('sukses','Berhasil mengubah data profil');
    	}else{

			$newpass = $req->validate([
				'password'   => 'nullable|min:6',
				
			]);
			$newpass['isverify'] = 'no';
    		if ($req->p1==$req->p2) {
				\App\AhliGizi::where('id','=',$req->idnya)
		    		->update([
		    			'nama_lengkap' => $req->name,
		    		]);	
		    	\App\User::where('id','=',$req->idUser)
		    		->update([
		    			'email' => $req->email,
		    			'name' => $req->name,
		    			'password' => bcrypt($req->p2),    			
	    		]);	
	    		return redirect()->back()->with('sukses','Berhasil mengubah data profil');
    		}
    		else{
    			return redirect()->back()->with('gagal','Password tidak sesuai');
    		}
    	}
    	
    	
    }
}
