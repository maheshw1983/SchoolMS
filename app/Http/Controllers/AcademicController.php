<?php

namespace App\Http\Controllers;

use App\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academics = Academic::latest()->paginate(5);

        return view('academics.index',compact('academics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->validate([

            'staffid' => 'required|string|unique:academics,staffid',
            'roleid' => 'required',
            'fullname' => 'required|string|min:2|max:255',
            'dob' => 'required|date_format:Y-m-d|before:18 years ago',
            'gender' => 'required',
            'nic' => ['required','string','unique:academics,nic','regex:|^[0-9]{9}[Vv]$|'],
            'paddress' => 'required|string|max:255',
            'caddress' => 'required|string|max:255',
            'contact' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:academics,email',
            'profession' => 'required',
            'qualifications' => 'required|string|max:255',
            'experience' => 'required|numeric',
            'department' => 'required',
            'leavebalance' => 'required',
            'username' => 'required|string|min:4|unique:academics,username',
            'passsword' => 'required|string|min:6|unique:academics,passsword',
            'confirmpassword' => 'required|same:passsword',
            'regdate' => 'required|date_format:Y-m-d'
        ]);


        $input = request()->all();
        $academic = Academic::create($input);

        return redirect()->route('academics.index')
            ->with('success','Academic Staff Member added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function show(Academic $academic)
    {
        return view('academics.show',compact('academic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        return view('academics.edit',compact('academic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academic $academic)
    {
        request()->validate([

            'staffid' => 'required|string',
            'roleid' => 'required',
            'fullname' => 'required|string|min:2|max:255',
            'dob' => 'required|date_format:Y-m-d|before:18 years ago',
            'gender' => 'required',
            'nic' => ['required','string','regex:|^[0-9]{9}[Vv]$|'],
            'paddress' => 'required|string|max:255',
            'caddress' => 'required|string|max:255',
            'contact' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255',
            'profession' => 'required',
            'qualifications' => 'required|string|max:255',
            'experience' => 'required|numeric',
            'department' => 'required',
            'leavebalance' => 'required',
            'username' => 'required|string|min:4',
            'passsword' => 'required|string|min:6',
            'confirmpassword' => 'required|same:passsword',
            'regdate' => 'required|date_format:Y-m-d'
        ]);

        $academic->update($request->all());

        return redirect()->route('academics.index')
            ->with('success','Academic Staff member details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic)
    {
        $academic->delete();

        return redirect()->route('academics.index')
            ->with('success','Academic Staff member details deleted successfully');
    }
}
