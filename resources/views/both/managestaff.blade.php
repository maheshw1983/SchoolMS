@extends('Homepage.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="background-color: #0e8033 ; height: 400px">
                {{--<img src="{{asset('images/event1.jpg')}}">--}}
                <div class="col-md-12" style=" color: whitesmoke">

                    <h1 class="text-center" style="padding: 10px">School Staff Management</h1>
                </div>

                <div class="row container-fluid" style="padding-top: 0px;">
                    <div class="col-md-3"   >
                        <div class="card">
                            <h5 class="card-header">
                                School Staff Management
                            </h5>
                            <div class="card-body">
                                <p class="card-text">
                                    <img src="{{asset('images/academicstaff.png')}}" style="width: 240px; height: 174px">
                                </p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn-outline-primary" onclick="window.location='{{ route("academics.create") }}'"> Enter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <h5 class="card-header">
                                Non-Academic Staff Management
                            </h5>
                            <div class="card-body">
                                <p class="card-text">
                                    <img src="{{asset('images/academic.png')}}" style="width: 240px; height: 174px">
                                </p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn-outline-primary" onclick="window.location='{{ route("nonacademics.create") }}'"> Enter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection