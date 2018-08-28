@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/sports_sidebar.css')}}">
    {{--<link rel="stylesheet" href="{{asset('/css/cric_form.css')}}">--}}
    {{--<script src="{{asset('/js/cric.js')}}"></script>--}}


    <div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset('images/sports1.jpg')}}" style="width: 100%; max-height:350px ">

                <hr>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row container-fluid">

            <div class="col-md-3" style="background-color: dimgrey">
                <div style="padding-top: 20px">
                    @include('sports.sidebar');
                </div>

            </div>

            <div class="col-md-9">

                <div class="container">
                    <form class="form-horizontal" role="form">
                        <h1 class="text-light card-header text-center">Enrollment Form for Cricket</h1>
                        <div class="form-group">
                            <label for="firstName" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email* </label>
                            <div class="col-sm-9">
                                <input type="email" id="email" placeholder="Email" class="form-control" name= "email"  required>
                            </div>
                        </div>
                        {{----}}
                        {{--<div class="form-group">--}}
                            {{--<label for="password" class="col-sm-3 control-label">Password*</label>--}}
                            {{--<div class="col-sm-9">--}}
                                {{--<input type="password" id="password" placeholder="Password" class="form-control" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="password" class="col-sm-3 control-label">Confirm Password*</label>--}}
                            {{--<div class="col-sm-9">--}}
                                {{--<input type="password" id="password" placeholder="Password" class="form-control" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{----}}
                        <div class="form-group">
                            <label for="birthDate" class="col-sm-3 control-label">Date of Birth*</label>
                            <div class="col-sm-9">
                                <input type="date" id="birthDate" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                            <div class="col-sm-9">
                                <input type="phoneNumber" id="phoneNumber" placeholder="Phone number" class="form-control" >
                                <span class="help-block">Your phone number won't be disclosed anywhere </span>
                            </div>
                        </div>
                        <div class="form-group container">
                            <label for="sel1" class="col-sm-3 control-label">Playing Role:</label>
                            <select class="form-control col-sm-3" id="sel1">
                                <option>Batsman</option>
                                <option>Bowler</option>
                                <option>Wicket-Keeper</option>
                                <option>All-Rounder</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Height" class="col-sm-3 control-label">Height* </label>
                            <div class="col-sm-9">
                                <input type="number" id="height" placeholder="Please write your height in centimetres" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weight" class="col-sm-3 control-label">Weight* </label>
                            <div class="col-sm-9">
                                <input type="number" id="weight" placeholder="Please write your weight in kilograms" class="form-control">
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-sm-3">Gender</label>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<label class="radio-inline">--}}
                                            {{--<input type="radio" id="femaleRadio" value="Female">Female--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<label class="radio-inline">--}}
                                            {{--<input type="radio" id="maleRadio" value="Male">Male--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div> <!-- /.form-group -->--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-sm-9 col-sm-offset-3">--}}
                                {{--<span class="help-block">*Required fields</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-primary btn-block">Enroll Myself</button>
                    </form> <!-- /form -->
                </div> <!-- ./container -->

            </div>



        </div>
    </div>


@endsection