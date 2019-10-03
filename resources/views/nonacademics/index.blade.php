@extends('nonacademics.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Non-Academic Staff Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('nonacademics.create') }}"> Add New Non-Academic Staff Member</a>
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
        @foreach ($nonacademics as $nonacademic)
            <tr>
                <td>{{ $nonacademic->staffid }}</td>
                <td>{{ $nonacademic->roleid }}</td>
                <td>{{ $nonacademic->fullname }}</td>
                <td>{{ $nonacademic->dob }}</td>
                <td>{{ $nonacademic->gender}}</td>
                <td>{{ $nonacademic->nic }}</td>
                <td>{{ $nonacademic->paddress }}</td>
                <td>{{ $nonacademic->caddress }}</td>
                <td>{{ $nonacademic->contact }}</td>
                <td>{{ $nonacademic->email }}</td>
                <td>{{ $nonacademic->profession }}</td>
                <td>{{ $nonacademic->qualifications }}</td>
                <td>{{ $nonacademic->experience }}</td>
                <td>{{ $nonacademic->department }}</td>
                <td>{{ $nonacademic->leavebalance }}</td>
                <td>{{ $nonacademic->username }}</td>
                <td>{{ $nonacademic->passsword }}</td>
                <td>{{ $nonacademic->confirmpassword }}</td>
                <td>{{ $nonacademic->regdate }}</td>
                <td>
                    <form action="{{ route('nonacademics.destroy',$nonacademic->staffid) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('nonacademics.show',$nonacademic->staffid) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('nonacademics.edit',$nonacademic->staffid) }}">Edit</a>

                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $nonacademics->links() !!}

@endsection