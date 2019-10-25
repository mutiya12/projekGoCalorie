<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Outlet;
use Auth;
use Illuminate\Http\Request;

class OutletController extends Controller
{

    public function index()
    {
        $this->authorize('manage_outlet');


        // nv ARTINYA NOT VERIFIED

        $userid = Auth::user()->id;

        $outletQuery_mine = Outlet::where('user_id','=',$userid)->first();
        // $outlets_mine = $outletQuery_mine->paginate(25);


        $outletQuery = Outlet::where('isverify','=','yes');
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outlets = $outletQuery->paginate(25);

        $outletQuery_nv = Outlet::where('isverify','=','no');
        $outletQuery_nv->where('name', 'like', '%'.request('q').'%');
        $outlets_nv = $outletQuery_nv->paginate(25);

        return view('outlets.index', compact('outlets','outlets_nv','outletQuery_mine'));
    }
    public function indexAdmin()
    {
        $this->authorize('manage_outlet');


        // nv ARTINYA NOT VERIFIED

        $userid = Auth::user()->id;

        // $outletQuery_mine = Outlet::where('user_id','=',$userid)->first();
        // $outlets_mine = $outletQuery_mine->paginate(25);


        $outletQuery = Outlet::where('isverify','=','yes');
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outlets = $outletQuery->paginate(25);

        $outletQuery_nv = Outlet::where('isverify','=','no');
        $outletQuery_nv->where('name', 'like', '%'.request('q').'%');
        $outlets_nv = $outletQuery_nv->paginate(25);

        return view('outlets.adminIndex', compact('outlets','outlets_nv'));
    }

    public function create()
    {
        // $this->authorize('create', new Outlet);

        return view('outlets.create');
    }

    public function store(Request $request)
    {
        // $this->authorize('create', new Outlet);

        $newOutlet = $request->validate([
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
            // 'email' => 'required', 'string', 'email', 'max:255', 'unique:users'.
        ]);


        $newOutlet['isverify'] = 'no';
        $newOutlet['latitude_nv'] = $request->latitude;
        $newOutlet['longitude_nv'] = $request->longitude;



        $usr = new \App\User;
        $usr->role = 'restoran';
        $usr->id = mt_rand(1000,9999);
        $newOutlet['user_id'] = $usr->id;
        $usr->email = $request->email;
        $usr->password = bcrypt($request->password);
        $usr->name = $request->name;

        $usr->save();



        $outlet = Outlet::create($newOutlet);

        return redirect('/login');
    }

    public function show(Outlet $outlet)
    {
        $thisUserAccount = \App\User::where('id','=',$outlet)->first();
        return view('outlets.show', compact('outlet','thisUserAccount'));
    }

    public function edit(Outlet $outlet)
    {
        $this->authorize('update', $outlet);

        return view('outlets.edit', compact('outlet'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        $this->authorize('update', $outlet);

        $outletData = $request->validate([
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        $outlet->update($outletData);


        return redirect()->route('outlets.show', $outlet);
    }

    public function destroy(Request $request, Outlet $outlet)
    {
        $this->authorize('delete', $outlet);

        $request->validate(['outlet_id' => 'required']);

        if ($request->get('outlet_id') == $outlet->id && $outlet->delete()) {
            return redirect()->route('outlets.index');
        }

        return back();
    }
}
