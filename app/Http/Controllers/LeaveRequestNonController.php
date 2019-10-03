<?php

namespace App\Http\Controllers;

use App\LeaveRequestNon;
use Illuminate\Http\Request;

class LeaveRequestNonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaverequestsnon = LeaveRequestNon::latest()->paginate(5);

        return view('leaverequestsnon.index',compact('leaverequestsnon'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leaverequestsnon.create');
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

            'staffid' => 'required|string|unique:leaverequestsnon,staffid',
            'fullname' => 'required|string|min:2|max:255',
            'profession' => 'required',
            'department' => 'required',
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d',
            'type' => 'required',
            'reason' => 'required|string|max:255',

        ]);


        $input = request()->all();
        $leaverequestnon = LeaveRequestNon::create($input);

        return redirect()->route('leaverequestsnon.index')
            ->with('success','Leave request submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveRequestNon  $leaveRequestNon
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveRequestNon $leaverequestnon)
    {
        return view('leaverequestsnon.show',compact('leaverequestnon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveRequestNon  $leaveRequestNon
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveRequestNon $leaverequestnon)
    {
        return view('leaverequestsnon.edit',compact('leaverequestnon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveRequestNon  $leaveRequestNon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveRequestNon $leaverequestnon)
    {
        request()->validate([

            'staffid' => 'required|string',
            'fullname' => 'required|string|min:2|max:255',
            'profession' => 'required',
            'department' => 'required',
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d',
            'type' => 'required',
            'reason' => 'required|string|max:255',
        ]);

        $leaverequestnon->update($request->all());

        return redirect()->route('leaverequestsnon.index')
            ->with('success','Leave Request details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveRequestNon  $leaveRequestNon
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveRequestNon $leaverequestnon)
    {
        $leaverequestnon->delete();

        return redirect()->route('leaverequestsnon.index')
            ->with('success','Leave Request details deleted successfully');
    }
}
