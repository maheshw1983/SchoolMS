@extends('leaverequests.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Leave Request</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('leaverequests.index') }}"> Back</a>
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

    <form action="{{ route('leaverequests.store') }}" method="POST">
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
                        <option value="Principal" @if (Input::old('profession') == 'Principal') selected="selected" @endif>Principal</option>
                        <option value="Secretary" @if (Input::old('profession') == 'Secretary') selected="selected" @endif>Secretary</option>
                        <option value="Vice Principal" @if (Input::old('profession') == 'Vice Principal') selected="selected" @endif>Vice Principal</option>
                        <option value="Sectional Head" @if (Input::old('profession') == 'Sectional Head') selected="selected" @endif>Sectional Head</option>
                        <option value="Teacher" @if (Input::old('profession') == 'Teacher') selected="selected" @endif>Teacher</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Departmant:</strong>
                    <select type="text" name="department" class="form-control" placeholder="Select your department">
                        <option value="School Head Office" @if (Input::old('department') == 'School Head Office') selected="selected" @endif>School Head Office</option>
                        <option value="English" @if (Input::old('department') == 'English') selected="selected" @endif>English</option>
                        <option value="Mathematics" @if (Input::old('department') == 'Mathematics') selected="selected" @endif>Mathematics</option>
                        <option value="Science" @if (Input::old('department') == 'Science') selected="selected" @endif>Science</option>
                        <option value="IT" @if (Input::old('department') == 'IT') selected="selected" @endif>IT</option>
                        <option value="Aesthetics" @if (Input::old('department') == 'Aesthetics') selected="selected" @endif>Aesthetics</option>
                        <option value="Home Science" @if (Input::old('department') == 'Home Science') selected="selected" @endif>Home Science</option>
                        <option value="Sinhala" @if (Input::old('department') == 'Sinhala') selected="selected" @endif>Sinhala</option>
                        <option value="Buddhism" @if (Input::old('department') == 'Buddhism') selected="selected" @endif>Buddhism</option>
                        <option value="PTS" @if (Input::old('department') == 'PTS') selected="selected" @endif>PTS</option>
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