@extends('academics.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Academic Staff Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('academics.create') }}"> Add New Academic Staff Member</a>
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
            <th>Staff ID</th>
            <th>Role ID</th>
            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>NIC</th>
            <th>Permamant Address</th>
            <th>Current Address</th>
            <th>Contact No</th>
            <th>Email Address</th>
            <th>Designation</th>
            <th>Qualifications</th>
            <th>Experience</th>
            <th>Department</th>
            <th>Leave Balance in days</th>
            <th>Username</th>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Registered Date</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($academics as $academic)
            <tr>
                <td>{{ $academic->staffid }}</td>
                <td>{{ $academic->roleid }}</td>
                <td>{{ $academic->fullname }}</td>
                <td>{{ $academic->dob }}</td>
                <td>{{ $academic->gender}}</td>
                <td>{{ $academic->nic }}</td>
                <td>{{ $academic->paddress }}</td>
                <td>{{ $academic->caddress }}</td>
                <td>{{ $academic->contact }}</td>
                <td>{{ $academic->email }}</td>
                <td>{{ $academic->profession }}</td>
                <td>{{ $academic->qualifications }}</td>
                <td>{{ $academic->experience }}</td>
                <td>{{ $academic->department }}</td>
                <td>{{ $academic->leavebalance }}</td>
                <td>{{ $academic->username }}</td>
                <td>{{ $academic->passsword }}</td>
                <td>{{ $academic->confirmpassword }}</td>
                <td>{{ $academic->regdate }}</td>
                <td>
                    <form action="{{ route('academics.destroy',$academic->staffid) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('academics.show',$academic->staffid) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('academics.edit',$academic->staffid) }}">Edit</a>

                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $academics->links() !!}

@endsection