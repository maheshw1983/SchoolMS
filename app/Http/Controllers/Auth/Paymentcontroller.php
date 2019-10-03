<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class homeController extends Controller
{
    public function index(){
        $home = Student::all();
        return view('home')->with('home',$home);
    }

    public function store(Request $request){

        // $this->validate($request,[
        //     'studentName'=>'required',
        //     'IndexNumber'=>'required',
        //     'Class'=>'required',
        //     'Grade'=>'required',
        //     'Year'=>'required',
        //     'Payment'=>'required',
       
        // ]);

        $home= new Studentfee ();

        $homet->studentName = $request->name;
        $home->IndexNumber =  $request->IndexNumber;
        $home->Class = $request->Class;
        $home->Grade=  $request->Grade;
        $home->Year =  $request->Year;
        $home->Payment =  $request->Payment;
        
        $home->save();

        $home = Home::all();
       // return redirect('homeTable');

       return redirect('/home')->with('home',$home);
    }

    public function show(){
        $home = home::all();
        return view('home')->with('home',$home);
    }

    public function edit($id){
        $home = home::find($id);
        return view('home')->with('home',$home);
    }

    public function destroy(Request $request){
        dd($request->student_id);
    }
}