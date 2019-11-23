<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaloriController extends Controller
{
    public function index()
    {
    	return view('kalori.index');
    }
    public function rekom(Request $req)
    {
    	
		if(empty($req->jk)){
			return redirect()->back()->with('gagal','Silahkan pilih jenis kelamin');
		}else if(empty($req->aktivitas)){
			return redirect()->back()->with('gagal','Silahkan pilih jenis aktivitas');
		}
		else{
    	if ($req->jk=="laki") {
			if ($req->aktivitas=="a") {
				$point = 1.66;
			}else if ($req->aktivitas=="b") {
                $point = 1.76;
            }
            else if ($req->aktivitas=="c") {
                $point = 2.10;
            }
    		$BMR = 66.42 + (13.75*$req->BB) + (5 *$req->TB) - (6.78*$req->UMUR) * $point;
    	}else if ($req->jk=="perempuan") {
            if ($req->aktivitas=="a") {
                $point = 1.55;
            }else if ($req->aktivitas=="b") {
                $point = 1.70;
            }
            else if ($req->aktivitas=="c") {
                $point = 2.00;
            }
    		$BMR = 655.1 + (9.65*$req->BB) + (1.85*$req->TB) - (4.68*$req->UMUR) * $point;
    	}

    	$BMR_PAGI = $BMR*30/100;
    	$BMR_SIANG = $BMR*40/100;
    	$BMR_MALAM = $BMR*30/100;

    	$BMR_PAGI_lebih = $BMR_PAGI+50;
    	$BMR_PAGI_kurang = $BMR_PAGI-50;


    	$BMR_SIANG_lebih = $BMR_SIANG+50;
    	$BMR_SIANG_kurang = $BMR_SIANG-50;


		$BMR_MALAM_lebih = $BMR_MALAM+50;
    	$BMR_MALAM_kurang = $BMR_MALAM-50;

    	// dd($BMR);

    	$menuPAGI = \App\Menu::where('kalori','<',$BMR_PAGI_lebih)
    		->where('kalori','>',$BMR_PAGI_kurang)
    		->get();

		$menuSIANG = \App\Menu::where('kalori','<',$BMR_SIANG_lebih)
    		->where('kalori','>',$BMR_SIANG_kurang)
    		->get();

    	$menuMALAM = \App\Menu::where('kalori','<',$BMR_MALAM_lebih)
    		->where('kalori','>',$BMR_MALAM_kurang)
    		->get();	    		





    	return view('kalori.hasilcari',compact('menuPAGI','menuSIANG','menuMALAM','BMR_PAGI_lebih','BMR_SIANG_lebih','BMR_MALAM_lebih','BMR_PAGI_kurang','BMR_SIANG_kurang','BMR_MALAM_kurang','BMR'));
	}
	}
}
