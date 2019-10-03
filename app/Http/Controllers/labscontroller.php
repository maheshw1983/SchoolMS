<?php

namespace App\Http\Controllers;

use foo\bar;
use Illuminate\Support\Facades\DB;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use App\labs;
use Illuminate\Http\Request;
use App\suppliers;

class labscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $labs = labs::all();
        $orders = Orders::where('type','=','Laboratory Equipments')->count();
        $stitems = DB::table('labs')->where('amount','=',labs::min('amount'))->pluck('name');


        return view('inventory.labs.labs')->with('labs', $labs)->with('orders',$orders)->with('st',$stitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->role_id;
        if ($user == 1) {
            $supplier = DB::table('suppliers')->where('type','=','L')->pluck('supplierID');
            return view('inventory.labs.addlabs')->with('suppliers', $supplier);
        } else {
            return redirect()->back()->with('error', 'You do not have rights to perform this action');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labs = new labs();
        $labs->productID = $request->input('productID');
        $labs->name = $request->input('name');
        $labs->amount = $request->input('amount');
        $labs->lab_type = $request->input('type');
        $labs->supplierID = $request->input('supplierID');

        $name= $request->input('name');
        $pid = $request->input('productID');

        if(DB::table('labs')->where('name','=',$name)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif (DB::table('labs')->where('productID','=',$pid)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif($request->input('amount') > 0){
            if ($request->input('productID') > 200 && $request->input('productID') > 400 && $request->input('type') == 'Chemistry Laboratory' && $request->input('supplierID') > 2000 && $request->input('supplierID') < 2400) {
                $labs->save();
                return redirect('/labs')->with('success', 'Record was added to the database successfully');
            }
            if ($request->input('productID') > 200 && $request->input('productID') > 400 && $request->input('type') == 'Physics Laboratory' && $request->input('supplierID') > 2400 && $request->input('supplierID') < 2700) {
                $labs->save();
                return redirect('/labs')->with('success', 'Record was added to the database successfully');
            }
            if ($request->input('productID') > 200 && $request->input('productID') > 400 && $request->input('type') == 'Computer Laboratory' && $request->input('supplierID') > 2700 && $request->input('supplierID') < 3000) {
                $labs->save();
                return redirect('/labs')->with('success', 'Record was added to the database successfully');
            } else {
                return redirect()->back()->with('error', 'Record was not added successfully');
            }
        }
        else{
            return redirect()->back()->with('error','Enter the correct qunatity');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = Auth::user()->role_id;
        $labs = labs::find($id);
        $supplier = DB::table('suppliers')->where('type','=','L')->pluck('supplierID');
        if ($user == 1) {
            return view('inventory.labs.editlabs')->with('labs', $labs)->with('suppliers',$supplier);
        } else {
            return redirect()->back()->with('error', 'You do not have rights to perform this action');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $labs = labs::find($id);
        $labs->productID = $request->input('productID');
        $labs->name = $request->input('name');
        $labs->amount = $request->input('amount');
        $labs->lab_type = $request->input('type');
        $labs->supplierID = $request->input('supplierID');

        if($request->input('amount') > 0){
            if ($request->input('productID') > 200 && $request->input('productID') > 400 && $request->input('type') == 'Chemistry Laboratory' && $request->input('supplierID') > 2000 && $request->input('supplierID') < 2400) {
                $labs->save();
                return redirect('/labs')->with('success', 'Record was added to the database successfully');
            }
            if ($request->input('productID') > 200 && $request->input('productID') > 400 && $request->input('type') == 'Physics Laboratory' && $request->input('supplierID') > 2400 && $request->input('supplierID') < 2700) {
                $labs->save();
                return redirect('/labs')->with('success', 'Record was added to the database successfully');
            }
            if ($request->input('productID') > 200 && $request->input('productID') > 400 && $request->input('type') == 'Computer Laboratory' && $request->input('supplierID') > 2700 && $request->input('supplierID') < 3000) {
                $labs->save();
                return redirect('/labs')->with('success', 'Record was added to the database successfully');
            } else {
                return redirect()->back()->with('error', 'Record was not added successfully');
            }
        }
        else{
            return redirect()->back()->with('error','Enter the correct quantity');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { $user = Auth::user()->role_id;
        $labs = labs::find($id);
        if ($user == 1) {
            DB::table('labs')->where('productID','=',$id)->delete();
            return redirect()->back()->with('success', 'Record was deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You can not perform this action');
        }
    }
}
