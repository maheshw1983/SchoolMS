@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/ihover.css')}}">
    <link rel="stylesheet" href="{{asset('/css/text_on_image.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sports_sidebar.css')}}">


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

            <div class="col-md-3 sports_sidebar">
                <div style="padding-top: 20px">
                    @if(auth()->user())
                        @if(auth()->user()->role_id == 1)
                            @include('sports.adminsidebar');
                        @endif
                    @endif

                    @include('sports.adminsidebar');
                    @include('sports.sidebar');
                </div>

            </div>

            <div class="col-md-9">

                <h1 class="text-center text-uppercase card-header" style="color: #00ad8f">Popular Among WCC Students</h1>

                <div class="row "   >

                    <div class="col-md-6" style="padding: 20px">
                        <div class="col-sm-6">

                            <!-- normal -->

                            <div class="ih-item square effect13 left_to_right">

                                <a href="#">
                                    <div class="img"><img src="{{asset('images/running.gif')}}" style="width: 300px; height:200px" alt="img"></div>
                                    <h3 class="bottom-left" style="color: black" >Running</h3>
                                    <div class="info">
                                        <h3 class="text-light">Running (Athletics)</h3>
                                        <h5 class="text-warning">For students in Grade 6 and above</h5>
                                        <input type="submit" value="Enroll Myself" class="btn btn-success" href="#">
                                        <hr>
                                        <input type="submit" value="Read More" class="btn btn-primary" href="#">
                                        {{--<p>oiudsnpoij  poihwsdv[pewrd v  bnepfdrovnme][  eifvhbe]rvpom  eivfnjhep]rfjw]p\eoiudsnpoij  poihwsdv[pewrd v  bnepfdrovnme][  eifvhbe]rvpom  eivfnjhep]rfjw]p\eoiudsnpoij  poihwsdv[pewrd v  bnepfdrovnme][  eifvhbe]rvpom  eivfnjhep]rfjw]p\eoiudsnpoij  poihwsdv[pewrd v  bnepfdrovnme][  eifvhbe]rvpom  eivfnjhep]rfjw]p\eoiudsnpoij  poihwsdv[pewrd v  bnepfdrovnme][  eifvhbe]rvpom  eivfnjhep]rfjw]p\eoiudsnpoij  poihwsdv[pewrd v  bnepfdrovnme][  eifvhbe]rvpom  eivfnjhep]rfjw]p\eldcm wpovjmw vpovbm </p>--}}
                                    </div>
                                </a>
                            </div>
                            <!-- end normal -->

                        </div>
                    </div>

                    <div class="col-md-6" style="padding: 20px">
                        <div class="col-sm-6">

                            <!-- normal -->
                            <div class="ih-item square effect13 top_to_bottom"><a href="#">
                                    <div class="img"><img src="{{asset('images/cricket.jpg')}}" style="width: 300px; height:200px" alt="img"></div>
                                    <h3 class="bottom-left" style="color: black" >Cricket</h3>
                                    <div class="info">
                                        <h3>Cricket</h3>
                                        <hr>
                                        <input type="submit" value="Enroll Myself" class="btn btn-success" href="#">
                                        <hr>
                                        <input type="submit" value="Read More" class="btn btn-primary" href="#">
                                    </div></a></div>
                            <!-- end normal -->

                        </div>
                    </div>




                    <div class="col-md-6" style="padding: 20px">
                        <div class="col-sm-6">

                            <!-- normal -->
                            <div class="ih-item square effect13 right_to_left"><a href="#">
                                    <div class="img"><img src="{{asset('images/volley.gif')}}" style="width: 300px; height:200px" alt="img"></div>
                                    <h3 class="bottom-left" style="color: black" >Volleyball</h3>
                                    <div class="info">
                                        <h3>VolleyBall</h3>
                                        <h5 class="text-warning">For students in Grade 6 and above</h5>
                                        <input type="submit" value="Enroll Myself" class="btn btn-success" href="#">
                                        <hr>
                                        <input type="submit" value="Read More" class="btn btn-primary" href="#">
                                    </div></a></div>
                            <!-- end normal -->

                        </div>
                    </div>

                    <div class="col-md-6" style="padding: 20px">
                        <div class="col-sm-6">

                            <!-- normal -->
                            <div class="ih-item square effect13 bottom_to_top"><a href="#">
                                    <div class="img"><img src="{{asset('images/jav.gif')}}" style="width: 300px; height:200px" alt="img"></div>
                                    <h3 class="bottom-left" style="color: black" >Javelin</h3>
                                    <div class="info">
                                        <h3>Javelin Throw</h3>
                                        <h5 class="text-warning">For students in Grade 6 and above</h5>
                                        <input type="submit" value="Enroll Myself" class="btn btn-success" href="#">
                                        <hr>
                                        <input type="submit" value="Read More" class="btn btn-primary" href="#">
                                    </div></a></div>
                            <!-- end normal -->

                        </div>
                    </div>




                    <div class="col-md-6" style="padding: 20px">
                        <div class="col-sm-6">

                            <!-- normal -->
                            <div class="ih-item square effect13 left_to_right"><a href="#">
                                    <div class="img"><img src="{{asset('images/highjump.gif')}}" style="width: 300px; height:200px" alt="img"></div>
                                    <h3 class="bottom-right" style="color: black" >High Jump</h3>
                                    <div class="info">
                                        <h3>High Jump</h3>
                                        <h5 class="text-warning">For students in Grade 6 and above</h5>
                                        <input type="submit" value="Enroll Myself" class="btn btn-success" href="#">
                                        <hr>
                                        <input type="submit" value="Read More" class="btn btn-primary" href="#">
                                    </div></a></div>
                            <!-- end normal -->

                        </div>
                    </div>

                    <div class="col-md-6" style="padding: 20px">
                        <div class="col-sm-6">

                            <!-- normal -->
                            <div class="ih-item square effect13 left_to_right"><a href="#">
                                    <div class="img"><img src="{{asset('images/football.gif')}}" style="width: 300px; height:200px" alt="img"></div>
                                    <h3 class="bottom-left" style="color: black" >Football</h3>
                                    <div class="info">
                                        <h3>Football</h3>
                                        {{--<h5 class="text-warning">For students in Grade 6 and above</h5>--}}
                                        <input type="submit" value="Enroll Myself" class="btn btn-success" href="#">
                                        <hr>
                                        <input type="submit" value="Read More" class="btn btn-primary" href="#">
                                    </div></a></div>
                            <!-- end normal -->

                        </div>
                    </div>




                </div>

            </div>



        </div>
    </div>


@endsection