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
    	

    	if ($req->jk=="laki") {
    		$BMR = 66.4730 + (13.7516*$req->BB) + (5.0033*$req->TB) - (6.7550*$req->UMUR) * $req->aktivitas;
    	}else if ($req->jk=="perempuan") {
    		$BMR = 655.0955 + (9.5634*$req->BB) + (1.8496*$req->TB) - (4.6756*$req->UMUR) * $req->aktivitas;
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
