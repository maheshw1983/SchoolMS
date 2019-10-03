<?php

namespace App\Http\Controllers;

use App\Resources;
use App\Orders;
use Illuminate\Support\Facades\DB;
use App\suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Resourcecontroller extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth')->except('logout');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resources::all();
        $orders = Orders::where('type','=','Resources')->count();
        $stitems = DB::table('resources')->where('amount','=',Resources::min('amount'))->pluck('name');


        return view('inventory.resources.resources')->with('resources', $resources)->with('orders',$orders)->with('st',$stitems);
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
            $supplier = suppliers::where('type', '=', 'R')->get();
            return view('inventory.resources.addresource')->with('suppliers', $supplier);
        } else {
            return redirect()->back()->with('error', 'You do not have permission to perform this action');
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
        $resource = new Resources;
        $resource->name = $request->input('name');
        $resource->productID = $request->input('productID');
        $resource->amount = $request->input('amount');
        $resource->supplierID = $request->input('supplier');
        $name= $request->input('name');
        $pid = $request->input('productID');

        if(DB::table('resources')->where('name','=',$name)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif (DB::table('resources')->where('productID','=',$pid)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif($request->input('amount') > 0){
            if ($request->input('productID') > 600 && $request->input('productID') < 700) {
                $resource->save();
                return redirect('/resource')->with('success', 'Record was added to the database sucessfully');
            } else {
                return redirect()->back()->with('error', 'Record was not added succssfully');
            }
        }
        else{
            return redirect()->back()->with('error','Enter the correct quantity');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->role_id;
        if ($user == 1) {
            $resources = Resources::find($id);
            $supplier = suppliers::where('type', '=', 'R')->get();
            return view('inventory.resources.editresources')->with('resources', $resources)->with('suppliers',$supplier);
        } else {
            return redirect()->back()->with('error', 'You do not have permission to perform this action');
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
        $resource = Resources::find($id);
        $resource->name = $request->input('name');
        $resource->productID = $request->input('productID');
        $resource->amount = $request->input('amount');
        $resource->supplierID = $request->input('supplier');

        $resource->name = $request->input('name');
        $resource->productID = $request->input('productID');
        $resource->amount = $request->input('amount');
        $resource->supplierID = $request->input('supplier');
        $name= $request->input('name');
        $pid = $request->input('productID');

        if(DB::table('resources')->where('name','=',$name)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif (DB::table('resources')->where('productID','=',$pid)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        elseif($request->input('amount') > 0){
            if ($request->input('productID') > 600 && $request->input('productID') < 700) {
                $resource->save();
                return redirect('/resource')->with('success', 'Record was added to the database sucessfully');
            } else {
                return redirect()->back()->with('error', 'Record was not added succssfully');
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
    {
        $user = Auth::user()->role_id;
        $resources = Resources::find($id);
        if ($user == 1) {
            DB::table('resources')->where('productID','=',$id)->delete();
            return back()->with('success', 'Record was deleted');
        } else {
            return redirect()->back()->with('error', 'You do not have permision to perform this action');
        }
    }
}
