<div class="col-md-12 sports_sidebar">
    @if(Auth()->user())
        <div>
            <div class="btn-block" style="padding-top: 15px">
                <button class="btn btn-warning " style="width:100%; min-height:60px;"><a
                            href="/Society/createDemo" style="color: red">Demo to Add a Society</a></button>

            </div>
        </div>
    @endif

    <div class="row" style="margin-left: 1%;">
        <form action="/Society/search" method="get">

            <input type="search" class="form-control pull-left searchHov" name="search" placeholder="Search Societies" style="margin-top: 10px">

        </form>
    </div>

    <div class="col-md-12 rounded" style=margin:1%;">
        @if(auth()->user())
            @if(Auth()->user()->role_id == 1 )

                <div class=" col-md-12 rounded" style="background-color: #a7cbac;padding:3%;margin:3%">
                    <div class="card-header text-center">
                        <b> Admin Panel</b>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-primary col-md-12"><a style="color:whitesmoke"
                                                                             href="{{action('SocietyController@create')}}">
                                Create a Society </a></button>
                    </div>

                </div>
            @endif

            @if(Auth()->user()->role_id == 2)
                <div class="btn-block" style="padding-top: 15px">
                    <button class="btn btn-outline-success" style="width: 100%; min-height: 60px ; "><a
                                href="/Society/mysocieties"
                                style="color: whitesmoke">My
                            Societies</a></button>
                </div>
                <br>
            @endif



        @endif
    </div>


    <div class="col-md-12 rounded" style="padding:3%;margin:1%">

        <div>
            <h1 class="text-center card-header" style="font-family: 'Apple Color Emoji' ">Societies at WCC</h1>
            <?php
            $socs = \App\Society::all();
            ?>
            @foreach($socs as $soc)
                <div>
                    <div class="row" style="margin:2%; border-style: ridge;border-radius: 10%">
                        <div class="row" style="height:60px;">
                            <div class=" col-3">
                                <img src="/storage/img/{{$soc->image}}" class="img img-responsive"
                                     style="width: 100%; height: 100%; border-radius: 50%">

                            </div>
                            <div class="col-9">
                                <a href="{{action('SocietyController@show' , [$soc->id])}}"><h5 class="text-center"
                                                                                                style="font-family: 'Adobe Kaiti Std R'; padding-top: 10px; color: #2c1fb9;">{{$soc->title}}</h5>
                                </a>

                            </div>
                        </div>


                    </div>
                </div>


            @endforeach
        </div>


    </div>
</div>
