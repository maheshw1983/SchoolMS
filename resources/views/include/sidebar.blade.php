@if(Auth()->user())
    <div class="btn-block" style="padding-top: 15px">
        <button class="btn btn-warning " style="width:100%; min-height:60px;"><a
                    href="/Event/createDemo" style="color: red">Demo to Add Event</a></button>

    </div>
@endif

<div>
    <form action="/Event/search" method="get">

        <input type="search" class="form-control pull-left searchHov" name="search" placeholder="Search Events"
               style="margin-top: 10px">

    </form>
</div>

<div class="btn-block" style="padding-top: 15px">
    <button class="btn btn-default " style="width: 100%; min-height: 60px ; background-color: #8affa3; "><a
                href="/Event/calendar">Event Calendar</a></button>
</div>

@if(auth()->user())
    @if(auth()->user()->role_id == 4)
        <hr>
        <div class="btn-block" style="padding-top: 15px">
            <button class="btn btn-default " style="width: 100%; min-height: 60px ; background-color: #8affa3; "><a
                        href="/Event/create">Create Event</a></button>
        </div>



        <div class="btn-block" style="padding-top: 15px;padding-bottom: 15px">
            <button class="btn btn-outline-info" style="width: 100%; min-height: 60px ; "><a href="/Event/myevents"
                                                                                             style="color: black">My
                    Events</a></button>
        </div>

    @endif
@endif
<hr>
<hr>
<div>

    <div class="container text-center ">
        <h3 class="text-capitalize text-dark " style="font-family: 'Adobe Gothic Std B'; padding-top: 10px">
            Archives</h3><br>
        @foreach( $archs as $row)
            <div class="" style="margin-bottom: 5% ">
                <h4><a href="/Event/monthlyEvent?month={{$row['month']}}&year={{$row['year']}}">
                        {{$row['month'].' '.$row['year']}}
                    </a>
                </h4>
            </div>
        @endforeach
    </div>

</div>
