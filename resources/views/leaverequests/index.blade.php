@extends('leaverequests.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Leave Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('leaverequests.create') }}"> Create New Leave Request</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Leave ID</th>
            <th>Staff ID</th>
            <th>Full Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Type of Leave</th>
            <th>Reason to apply for leave</th>
            <th>Leave Status</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($leaverequests as $leaverequest)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $leaverequest->staffid }}</td>
                <td>{{ $leaverequest->fullname }}</td>
                <td>{{ $leaverequest->profession}}</td>
                <td>{{ $leaverequest->department }}</td>
                <td>{{ $leaverequest->from }}</td>
                <td>{{ $leaverequest->to }}</td>
                <td>{{ $leaverequest->type }}</td>
                <td>{{ $leaverequest->reason }}</td>
                <td>{{ $leaverequest->status }}</td>
                <td>
                    <form action="{{ route('leaverequests.destroy',$leaverequest->leaveid) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('leaverequests.show',$leaverequest->leaveid) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('leaverequests.edit',$leaverequest->leaveid) }}">Edit</a>

                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $leaverequests->links() !!}

@endsection