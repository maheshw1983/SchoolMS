<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stationary;
use App\suppliers;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Stationarycontroller extends Controller
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
        $stock = stationary::all();
        $orders = Orders::where('type','=','Stationery')->count();
        $stitems = DB::table('stationaries')->where('amount','=',stationary::min('amount'))->pluck('name');


        return view('inventory.stationary.stationary')->with('stocks', $stock)->with('orders',$orders)->with('st',$stitems);

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
            $supplier = suppliers::where('type', '=', 'S')->get();
            return view('inventory.stationary.addstationary')->with('suppliers', $supplier);
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
        $user = Auth::user()->role_id;
        $st = new stationary();
        $st->name = $request->input('name');
        $st->productID = $request->input('productID');
        $st->amount = $request->input('quantity');
        $st->supplierID = $request->input('supplier');

        $name= $request->input('name');
        if(DB::table('stationaries')->where('name','=',$name)->exists()){
            return redirect()->back()->with('error','Item already exists in the database');
        }
        if ($request->quantity > 0){
            if ($request->input('productID') >= 100 && $request->input('productID') < 200) {
                $st->save();
                return redirect('/stationary')->with('success', 'item added to the database');
            } else {
                return redirect()->back()->with('error', 'Enter a valid Product ID');
            }
        }
        else{
            return redirect()->back()->with('error', 'Enter the correct quantity');

        }

//            return back()->with('error','You have to log in as the admin to perform this action');


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
        if ($user == 1) {
            $stationary = stationary::find($id);
            $st = $stationary::all();
            return view('inventory.stationary.editstationary')->with('stationary', $stationary)->with('st', $st);
        } else {
            return redirect()->back()->with('error', 'You do not have rights to perform the action');
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
        $st = stationary::find($id);
        $st->name = $request->input('name');
        $st->productID = $request->input('productID');
        $st->amount = $request->input('quantity');
        $st->supplierID = $request->input('supplier');

        if ($request->quantity > 0){
            if ($request->input('productID') >= 100 && $request->input('productID') < 200) {
                $st->save();
                return redirect('/stationary')->with('success', 'item added to the database');
            } else {
                return redirect()->back()->with('error', 'Enter a valid Product ID');
            }
        }
        else{
            return redirect()->back()->with('error', 'Enter the correct quantity');

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
        $labs = stationary::find($id);
        if($user == 1){
            DB::table('stationaries')->where('productID','=',$id)->delete();
            return back()->with('success','Record was deleted successfully');
        }
        else{
            return redirect()->back()->with('error','You do not have rights to perform this action');
        }
    }


}
