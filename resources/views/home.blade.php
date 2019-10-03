@extends('layout')

@section('content')

    <div class="col-12">
        
        <link rel="stylesheet" href="{{asset('/css/home_card.css')}}">

        <div class="">
            <img src="{{asset('images/library.jpg')}}"width="100%" height="500px">
        </div>
        <br>
        <br>
        <br>

        <div class="col-12">
            <header class="text-center card-header"><h style="font-size:40px; font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;>Welcome to the 2018-2019 academic school year at<br> Wickramashla Central College</h></header>
        </div>
        <br>
        <br>
        <br>
        <div class="col-12">
        </div>

        <div class="row col-12 rounded" style="padding:3% ; margin-top:1%; margin-left: 1px; background-image: url({{asset('images/cloud2.jpeg')}})" >

            <div class="example-2 col-5 pull-right card card_left">
                <div class="wrapper" style="background-image: url({{ asset('images/library1.jpg') }})" >
                    <div class="header">
                    </div>
                    <div class="data">
                        <div class="content">
                            <span class="author"></span>
                            <h1 class="title"><a href="#" >Library AT Wickramashila College </a></h1>
                            <p class="text" >WCC possesses a modern library managament system which will help users learn and gain knowledge on a vast variety of subjects.</p>
                            <div class="btn btn-primary"><a href="#" class="button">Read more</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">

            </div>

            <div class="example-2 col-5 card card_right ">
                <div class="wrapper" style="background-image: url({{ asset('images/sports001.jpg') }}) " >
                    <div class="header">
                        <div class="date">
                            <span class="day">12</span>
                            <span class="month">Aug</span>
                            <span class="year">2016</span>
                        </div>
                        <ul class="menu-content">
                            <li>
                                <a href="#" class="fa fa-bookmark-o"></a>
                            </li>
                            <li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
                            <li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
                        </ul>
                    </div>
                    <div class="data">
                        <div class="content">
                            <span class="author"></span>
                            <h1 class="title"><a href="#">Sports AT Wickramashila College </a></h1>
                            <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                            <div class="btn btn-primary"><a href="#" class="button">Read more</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="example-2 col-5 card card_left ">
                <div class="wrapper" style="background-image: url({{ asset('images/sports001.jpg') }}) " >
                    <div class="header">
                        <div class="date">
                            <span class="day">12</span>
                            <span class="month">Aug</span>
                            <span class="year">2016</span>
                        </div>
                        <ul class="menu-content">
                            <li>
                                <a href="#" class="fa fa-bookmark-o"></a>
                            </li>
                            <li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
                            <li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
                        </ul>
                    </div>
                    <div class="data">
                        <div class="content">
                            <span class="author"></span>
                            <h1 class="title"><a href="#">Society AT Wickramashila College </a></h1>
                            <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                            <div class="btn btn-primary"><a href="#" class="button">Read more</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">

            </div>
            <div class="example-2 col-5 card card_right ">
                <div class="wrapper" style="background-image: url({{ asset('images/sports001.jpg') }}) " >
                    <div class="header">
                        <div class="date">
                            <span class="day">12</span>
                            <span class="month">Aug</span>
                            <span class="year">2016</span>
                        </div>
                        <ul class="menu-content">
                            <li>
                                <a href="#" class="fa fa-bookmark-o"></a>
                            </li>
                            <li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
                            <li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
                        </ul>
                    </div>
                    <div class="data">
                        <div class="content">
                            <span class="author"></span>
                            <h1 class="title"><a href="#">Events AT Wickramashila College </a></h1>
                            <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                            <div class="btn btn-primary"><a href="#" class="button">Read more</a></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <br>
        <br>

        <div class="col-12" style="background-color: #ddf0ee;padding:5%;border-style: dashed">
            <div class="" style=" font-size: 25px; background-color: #00FFFF; border-radius: 50px; border-style: ridge">
                <div class="text-center"><b>
                    Our Vision Statement</b>
                </div>
                <div class="card-body">
                    <p class="Italic" style="font-family: 'Droid Sans Mono Dotted'">
                        Presenting a very Grand Wickramashilian, to the Nation with Competencies, appreciating the Sri Lankan Identity.
                    </p>
                </div>
            </div>
        </div>
    <br>
    <br>
    <br>


    </div>

    {{--<div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 col-12" >--}}
    {{--<div class="carousel slide col-12" id="carousel-546324">--}}
    {{--<ol class="carousel-indicators" >--}}
    {{--<li data-slide-to="0" data-target="#carousel-546324">--}}
    {{--</li>--}}
    {{--<li data-slide-to="1" data-target="#carousel-546324" class="active">--}}
    {{--</li>--}}
    {{--<li data-slide-to="2" data-target="#carousel-546324">--}}
    {{--</li>--}}
    {{--</ol>--}}
    {{--<div class="container carousel-inner col-12" >--}}
    {{--<div class="carousel-item col-12">--}}
    {{--<img class="d-block col-12" style="width:1300px;height: 500px" alt="Carousel Bootstrap First"--}}
    {{--src="{{asset('images/school_Front.gif')}}">--}}
    {{--<div class="carousel-caption">--}}
    {{--<h4>--}}
    {{--First Thumbnail label--}}
    {{--</h4>--}}
    {{--<p>--}}
    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non--}}
    {{--mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id--}}
    {{--elit.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="carousel-item active">--}}
    {{--<img class="d-block" style="width:1300px; height: 500px" alt="Carousel Bootstrap Second"--}}
    {{--src="{{asset('images/school1.jpg')}}">--}}
    {{--<div class="carousel-caption">--}}
    {{--<h4>--}}
    {{--Second Thumbnail label--}}
    {{--</h4>--}}
    {{--<p>--}}
    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non--}}
    {{--mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id--}}
    {{--elit.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="carousel-item">--}}
    {{--<img class="d-block" style="width:1300px; height: 500px" alt="Carousel Bootstrap Third"--}}
    {{--src="{{asset('images/soocl3.jpg')}}">--}}
    {{--<div class="carousel-caption">--}}
    {{--<h4>--}}
    {{--Third Thumbnail label--}}
    {{--</h4>--}}
    {{--<p>--}}
    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non--}}
    {{--mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id--}}
    {{--elit.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<a class="carousel-control-prev" href="#carousel-546324" data-slide="prev"><span--}}
    {{--class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a>--}}
    {{--<a class="carousel-control-next" href="#carousel-546324" data-slide="next"><span--}}
    {{--class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
