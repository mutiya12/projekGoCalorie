<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function accThisOutlets(Request $req)
    {
    	\App\Outlet::where('id','=',$req->thisID)
    		->update([
    			'isverify' => 'yes', 
    		]);
    	return redirect()->back();
    }
}
