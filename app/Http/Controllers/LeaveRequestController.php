<?php

namespace App\Http\Controllers;

use App\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaverequests = LeaveRequest::latest()->paginate(5);

        return view('leaverequests.index',compact('leaverequests'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leaverequests.create');
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

            'staffid' => 'required|string|unique:leaverequests,staffid',
            'fullname' => 'required|string|min:2|max:255',
            'profession' => 'required',
            'department' => 'required',
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d',
            'type' => 'required',
            'reason' => 'required|string|max:255',

        ]);


        $input = request()->all();
        $leaverequest = LeaveRequest::create($input);

        return redirect()->route('leaverequests.index')
            ->with('success','Leave request submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveRequest $leaverequest)
    {
        return view('leaverequests.show',compact('leaverequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveRequest $leaverequest)
    {
        return view('leaverequests.edit',compact('leaverequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveRequest $leaverequest)
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

        $leaverequest->update($request->all());

        return redirect()->route('leaverequests.index')
            ->with('success','Leave Request details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveRequest  $leaveRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveRequest $leaverequest)
    {
        $leaverequest->delete();

        return redirect()->route('leaverequests.index')
            ->with('success','Leave Request details deleted successfully');
    }
}
