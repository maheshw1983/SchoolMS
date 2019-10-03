@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/ihover.css')}}">
    <link rel="stylesheet" href="{{asset('/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sports_sidebar.css')}}">


    <div class="container-fluid">
        <div class="row container-fluid">

            <div class="col-md-3 sports_sidebar" >
                <div style="padding-top: 20px">
                    @include('sports.sidebar');
                </div>

            </div>

            <div class="col-md-9">
                @if($students)
                    <h1>Students Enrolled For</h1>
                    <div class="container wrap">
                        <div class="row">

                            @foreach($user as $student)

                                <div class="col-md-3" style="margin:2%">
                                    <div class="well well-sm">
                                        <div>
                                            <div class=" col-md-offset-12">
                                                <img src="{{asset('storage/img/student.png')}}" style="width:100%" class="img"/>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-md-12">
                                                <h4>{{$student->name}}</h4>
                                                <small><cite title="San Diego, USA">Student Address <i
                                                                class="glyphicon glyphicon-map-marker"></i></cite>
                                                </small>
                                                <p>
                                                    <i class="glyphicon glyphicon-envelope"></i>{{$student->email}}
                                                    <br/>
                                                    <i class="glyphicon glyphicon-globe"></i><a
                                                            href="https://www.prepbootstrap.com"></a>
                                                    <br/>
                                                    <i class="glyphicon glyphicon-gift"></i>Student Birthday or Age
                                                </p>
                                                <div class="btn">
                                                    <a href="#" class="btn btn-danger">Remove Student</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                @else
                    <h1>No Students Has been Enrolled under this sport</h1>
                @endif


            </div>


        </div>
    </div>




@endsection