<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {
//        return view('adminDashboard');

        if(Auth::attempt([

            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::where('email', $request->email)->first();

//            dd($user->admin);

            if($user->admin == 1)
            {
                return redirect('/adminDashboard')->with('success' , 'Logged in as an Admin');
            }

            return redirect('/home');

        }
        else{
            return redirect()->back()->with('error' , 'Error Logging in , check yout credentials again');

        }
    }

    public function createAdmin()
    {
        return view('adminPages.createAdmin');

    }

    public function storeAdmin(Request $request)
    {
        $user = new User();

        $lastUser = DB::table('users')->orderBy('id', 'desc')->first();
        $lastID = $lastUser->id;

        $user->id = $lastID + 1;
        $user->name = request('name');
        $user->email = request('email');
        $user->admin = 1;
        $user->password = Hash::make(request('password'));
        $user->role_id = 1;
        $user->gender = "Admin" ;
        $user->birthday = now();

        $user->save();

        return redirect('/adminDashboard')->with('success' , 'Admin has been created');

    }

    public function admins()
    {
        $admins = User::where('admin' , 1)->get();

        return view('adminPages.allAdmins')->with('admins' , $admins);
    }


    public function Admindestroy($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return back()->with('success' , 'Admin has been deleted');
    }
}
