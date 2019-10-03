@extends('leaverequestsnon.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Leave Request</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('leaverequestsnon.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaverequestsnon.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Staff ID:</strong>
                    <input type="text" name="staffid" class="form-control" value="{{ old('staffid') }}" placeholder="Enter Staff ID">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" placeholder="Enter Full Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Designation:</strong>
                    <select type="text" name="profession" class="form-control" placeholder="Select your designation">
                        <option value="Clerical Clerk" @if (Input::old('profession') == 'Clerical Clerk') selected="selected" @endif>Clerical Clerk</option>
                        <option value="Accountant" @if (Input::old('profession') == 'Accountant') selected="selected" @endif>Accountant</option>
                        <option value="Inventory Manager" @if (Input::old('profession') == 'Inventory Manager') selected="selected" @endif>Inventory Manager</option>
                        <option value="Sales Manager" @if (Input::old('profession') == 'Sales Manager') selected="selected" @endif>Sales Manager</option>
                        <option value="Canteen Manager" @if (Input::old('profession') == 'Canteen Manager') selected="selected" @endif>Canteen Manager</option>
                        <option value="Bookshop Manager" @if (Input::old('profession') == 'Bookshop Manager') selected="selected" @endif>Bookshop Manager</option>
                        <option value="Librarian" @if (Input::old('profession') == 'Librarian') selected="selected" @endif>Librarian</option>
                        <option value="Lab Assistant" @if (Input::old('profession') == 'Lab Assistant') selected="selected" @endif>Lab Assistant</option>
                        <option value="Security Officer" @if (Input::old('profession') == 'Security Officer') selected="selected" @endif>Security Officer</option>
                        <option value="Cleaner" @if (Input::old('profession') == 'Cleaner') selected="selected" @endif>Cleaner</option>
                        <option value="Worker" @if (Input::old('profession') == 'Worker') selected="selected" @endif>Worker</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Departmant:</strong>
                    <select type="text" name="department" class="form-control" placeholder="Select your department">
                        <option value="School Head Office" @if (Input::old('department') == 'School Head Office') selected="selected" @endif>School Head Office</option>
                        <option value="Finance Department" @if (Input::old('department') == 'Finance Department') selected="selected" @endif>Finance Department</option>
                        <option value="Inventory Department" @if (Input::old('department') == 'Inventory Department') selected="selected" @endif>Inventory Department</option>
                        <option value="Sales Department" @if (Input::old('department') == 'Sales Department') selected="selected" @endif>Sales Department</option>
                        <option value="Canteen" @if (Input::old('department') == 'Canteen') selected="selected" @endif>Canteen</option>
                        <option value="Bookshop" @if (Input::old('department') == 'Bookshop') selected="selected" @endif>Bookshop</option>
                        <option value="Library" @if (Input::old('department') == 'Library') selected="selected" @endif>Library</option>
                        <option value="Lab" @if (Input::old('department') == 'Lab') selected="selected" @endif>Lab</option>
                        <option value="Security Department" @if (Input::old('department') == 'Security Department') selected="selected" @endif>Security Department</option>
                        <option value="Cleaning Department" @if (Input::old('department') == 'Cleaning Department') selected="selected" @endif>Cleaning Department</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Duration:</strong>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>From Date:</strong>
                    <input type="date" name="from" class="form-control" value="{{ old('from') }}" placeholder="Select the from date" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>To Date:</strong>
                    <input type="date" name="to" class="form-control" value="{{ old('to') }}" placeholder="Select the to date" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type of Leave:</strong>
                    <select type="text" name="type" class="form-control" placeholder="Select your type of leave">
                        <option value="Casual" @if (Input::old('type') == 'Casual') selected="selected" @endif>Casual</option>
                        <option value="Sick" @if (Input::old('type') == 'Sick') selected="selected" @endif>Sick</option>
                        <option value="Maternity" @if (Input::old('type') == 'Maternity') selected="selected" @endif>Maternity</option>
                        <option value="Paternity" @if (Input::old('type') == 'Paternity') selected="selected" @endif>Paternity</option>
                        <option value="Bereavement" @if (Input::old('type') == 'Bereavement') selected="selected" @endif>Bereavement</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reason to apply for leave:</strong>
                    <textarea class="form-control" style="height:150px" name="reason" placeholder="Enter your reasons">{{ Input::old('reason') }}
</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>



        </div>
        </div>

    </form>

@endsection