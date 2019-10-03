@extends('leaverequestsnon.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Leave Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('leaverequestsnon.create') }}"> Create New Leave Request</a>
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
        @foreach ($leaverequestsnon as $leaverequestnon)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $leaverequestnon->staffid }}</td>
                <td>{{ $leaverequestnon->fullname }}</td>
                <td>{{ $leaverequestnon->profession}}</td>
                <td>{{ $leaverequestnon->department }}</td>
                <td>{{ $leaverequestnon->from }}</td>
                <td>{{ $leaverequestnon->to }}</td>
                <td>{{ $leaverequestnon->type }}</td>
                <td>{{ $leaverequestnon->reason }}</td>
                <td>{{ $leaverequestnon->status }}</td>
                <td>
                    <form action="{{ route('leaverequestsnon.destroy',$leaverequestnon->leaveid) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('leaverequestsnon.show',$leaverequestnon->leaveid) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('leaverequestsnon.edit',$leaverequestnon->leaveid) }}">Edit</a>

                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $leaverequestsnon->links() !!}

@endsection