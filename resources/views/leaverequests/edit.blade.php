@extends('leaverequests.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Leave Details</h2>
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

    <form action="{{ route('leaverequests.update',$leaverequest->leaveid) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Staff ID:</strong>
                    <input type="text" name="staffid" value="{{$leaverequest->staffid}}"  class="form-control" placeholder="Enter Staff ID">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="fullname" value="{{ $leaverequest->fullname }}" class="form-control" placeholder="Enter Full Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Designation:</strong>
                    <select type="text" name="profession" class="form-control" placeholder="Select your designation">
                        <option value = "Principal" @if($leaverequest->profession=="Principal") selected @endif>Principal</option>
                        <option value = "Vice Principal" @if($leaverequest->profession=="Vice Principal") selected @endif>Vice Principal</option>
                        <option value = "Secretory" @if($leaverequest->profession=="Secretory") selected @endif>Secretory</option>
                        <option value = "Sectional Head" @if($leaverequest->profession=="Sectional Head") selected @endif>Sectional Head</option>
                        <option value = "Teacher" @if($leaverequest->profession=="Teacher") selected @endif>Teacher</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Departmant:</strong>
                    <select type="text" name="department" class="form-control" placeholder="Select your department">
                        <option value = "School Head Office" @if($leaverequest->department=="School Head Office") selected @endif>School Head Office</option>
                        <option value = "English" @if($leaverequest->department=="English") selected @endif>English</option>
                        <option value = "Mathematics" @if($leaverequest->department=="Mathematics") selected @endif>Mathematics</option>
                        <option value = "Science" @if($leaverequest->department=="Science") selected @endif>Science</option>
                        <option value = "IT" @if($leaverequest->department=="IT") selected @endif>IT</option>
                        <option value = "Aesthetics" @if($leaverequest->department=="Aesthetics") selected @endif>Aesthetics</option>
                        <option value = "Home Science" @if($leaverequest->department=="Home Science") selected @endif>Home Science</option>
                        <option value = "Sinhala" @if($leaverequest->department=="Sinhala") selected @endif>Sinhala</option>
                        <option value = "Buddhism" @if($leaverequest->department=="Buddhism") selected @endif>Buddhism</option>
                        <option value = "PTS" @if($leaverequest->department=="PTS") selected @endif>PTS</option>
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
                    <input type="date" name="from" value="{{ $leaverequest->from }}" class="form-control" placeholder="Select your from date" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>To Date:</strong>
                    <input type="date" name="to" value="{{ $leaverequest->to }}" class="form-control" placeholder="Select your to date" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type of Leave:</strong>
                    <select type="text" name="type" class="form-control" placeholder="Select your type of leave">
                        <option value="Casual" @if ($leaverequest->type=="Casual") selected @endif>Casual</option>
                        <option value="Sick" @if ($leaverequest->type=="Sick") selected @endif>Sick</option>
                        <option value="Maternity" @if($leaverequest->type=="Maternity") selected @endif>Maternity</option>
                        <option value="Paternity" @if($leaverequest->type=="Paternity") selected @endif>Paternity</option>
                        <option value="Bereavement" @if ($leaverequest->type=="Bereavement") selected @endif>Bereavement</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reason to apply for leave:</strong>
                    <textarea class="form-control" style="height:150px" name="reason" placeholder="Enter reason to apply for leave">{{ $leaverequest->reason}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

    </form>

@endsection