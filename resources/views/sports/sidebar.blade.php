@if(Auth()->user())
    <div class="btn-block" style="padding-top: 15px">
        <button class="btn btn-warning " style="width:100%; min-height:60px;"><a
                    href="/Sport/createDemo" style="color: red">Demo to Add a Sport</a></button>

    </div>
@endif

<div class="row" style="margin: 1%; margin-bottom: 3%">
    <form action="/Sport/search" method="get">

        <input type="search" class="form-control pull-left searchHov" name="search" placeholder="Search Sports" style="margin-top: 10px">

    </form>
</div>

<div>
    @if(auth()->user())
        @if(auth()->user()->role_id == 1)
            @include('sports.adminsidebar');
        @endif
        @if(Auth()->user()->role_id == 2)
            <div class="btn-block" style="padding-top: 15px">
                <button class="btn btn-success" style="width: 100%; min-height: 60px ; "><a href="/Sport/mysports" style="color: whitesmoke">
                        My Sports</a></button>
            </div>
            <br>
        @endif
    @endif
</div>


<div class="sidebar left container-fluid " style="width: 100%">

    <?php
    $Allsports = \App\Sport::all();
    $Malesports = \App\Sport::where('gender', "Male")->get();
    $Femalesports = \App\Sport::where('gender', "Female")->get();
    $Bothsports = \App\Sport::where('gender', "Both")->get();
    ?>

    <ul class="list-sidebar bg-defoult">

        {{--<li><a href="#"><i class="fa fa-dice"></i> <span class="nav-label">All sports</span></a></li>--}}
        <li><a href="#" data-toggle="collapse" data-target="#allsports" class="collapsed active"> <i
                        class="fa fa-dice"></i> <span class="nav-label">All Sports</span> <span
                        class="fa fa-chevron-left pull-right"></span> </a>
            <ul class="sub-menu collapse" id="allsports">
                @foreach($Allsports as $sport)
                    <li class="text-white"><a
                                href="{{ action('SportController@show',[$sport->id])}}">{{$sport->title}}</a></li>
                @endforeach
            </ul>
        </li>

        <li><a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i
                        class="fa fa-walking"></i> <span class="nav-label">Sports(Boys)</span> <span
                        class="fa fa-chevron-left pull-right"></span> </a>
            <?php
            $Allsports = \App\Sport::all();
            $Malesports = \App\Sport::where('gender', "Male")->get();
            $Femalesports = \App\Sport::where('gender', "Female")->get();
            $Bothsports = \App\Sport::where('gender', "Both")->get();
            ?>
            <ul class="sub-menu collapse" id="products">
                @foreach($Malesports as $sport)
                    <li class="text-white"><a
                                href="{{ action('SportController@show',[$sport->id]) }}">{{$sport->title}}</a></li>
                @endforeach

            </ul>
        </li>
        {{--<li> <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a> </li>--}}
        <li><a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i
                        class="fa fa-female"></i> <span class="nav-label">Sports(Girls) </span><span
                        class="fa fa-chevron-left pull-right"></span></a>
            <ul class="sub-menu collapse" id="tables">
                {{--<li class="active"><a href="#">Running 100M</a></li>--}}
                @foreach($Femalesports as $sport)
                    <li class="text-white"><a
                                href="{{ action('SportController@show',[$sport->id]) }}">{{$sport->title}}</a></li>
                @endforeach

            </ul>
        </li>
        <li><a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i
                        class="fa fa-trophy"></i> <span class="nav-label">Sports for All</span><span
                        class="fa fa-chevron-left pull-right"></span></a>
            <ul class="sub-menu collapse" id="e-commerce">
                @foreach($Bothsports as $sport)
                    <li class=""><a href="{{ action('SportController@show',[$sport->id]) }}">{{$sport->title}}</a></li>
                @endforeach
            </ul>
        </li>


    </ul>
</div>


<script>
    $(document).ready(function () {
        $('button').click(function () {
            $('.sidebar').toggleClass('fliph');
        });


    });
</script>
