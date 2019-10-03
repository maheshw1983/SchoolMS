<?php

namespace App\Http\Controllers;

use App\NonAcademic;
use Illuminate\Http\Request;

class NonAcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nonacademics = NonAcademic::latest()->paginate(5);

        return view('nonacademics.index',compact('nonacademics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nonacademics.create');
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

            'staffid' => 'required|string|unique:nonacademics,staffid',
            'roleid' => 'required',
            'fullname' => 'required|string|min:2|max:255',
            'dob' => 'required|date_format:Y-m-d|before:18 years ago',
            'gender' => 'required',
            'nic' => ['required','string','unique:nonacademics,nic','regex:|^[0-9]{9}[Vv]$|'],
            'paddress' => 'required|string|max:255',
            'caddress' => 'required|string|max:255',
            'contact' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:nonacademics,email',
            'profession' => 'required',
            'qualifications' => 'required|string|max:255',
            'experience' => 'required|numeric',
            'department' => 'required',
            'leavebalance' => 'required',
            'username' => 'required|string|min:4|unique:nonacademics,username',
            'passsword' => 'required|string|min:6|unique:nonacademics,passsword',
            'confirmpassword' => 'required|same:passsword',
            'regdate' => 'required|date_format:Y-m-d'
        ]);


        $input = request()->all();
        $nonacademic = NonAcademic::create($input);

        return redirect()->route('nonacademics.index')
            ->with('success','Non-Academic Staff Member added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function show(NonAcademic $nonacademic)
    {
        return view('nonacademics.show',compact('nonacademic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function edit(NonAcademic $nonacademic)
    {
        return view('nonacademics.edit',compact('nonacademic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NonAcademic $nonacademic)
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

        $nonacademic->update($request->all());

        return redirect()->route('nonacademics.index')
            ->with('success','Non-Academic Staff member details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function destroy(NonAcademic $nonacademic)
    {
        $nonacademic->delete();

        return redirect()->route('nonacademics.index')
            ->with('success','Non-Academic Staff member details deleted successfully');
    }
}
