@extends('layout')

@section('content')
    <div class="contsainer-fluid">  {{--Remove container fluid to make the carousal width 100%--}}

        <div class="row ">
            <div class="col-md-12">
                @include('event.eventcarousal')
                <hr>
                <div class="row container-fluid pull-left">

                    <div class="col-md-9">
                        @if(count($events)>0)
                            @foreach( $events as $event )
                                <div class="col-md-12 row jumbotron" style="background-color: lightgray">
                                    <div class="col-md-8">
                                        <div>
                                            <h2>
                                                {{$event->title}}
                                            </h2>
                                            <p>
                                                {{--Over 60 schools across the country are holding a ‘Day of English’ on 14 September 2018. Students will take part in a Shakespeare-inspired English lessons, exploring their knowledge of Shakespeare as well as putting on short performances, playing their parts in English.--}}
                                                {{$event->description}}
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="{{ action('EventController@show',[$event->id]) }}">View Event in Detail</a>
                                            </p>

                                            {{--{{$event->society()->email}}--}}
                                            @if(auth()->user())
<!--                                                --><?php
//                                                $socid = \App\Society::where('id' , $event->society_id)->first();
//                                                $user = \App\User::where('email' , $socid->email)->first();
//                                                if (!$user){
//                                                    $user->id = null;
//                                                    $user->id = 1;
//                                                }

                                                ?>
{{--                                                @if(auth()->user()->id == $event->user_id ||  auth()->user()->id == $user->id )--}}
                                                    @if(auth()->user()->id == $event->user_id)
                                                    <div class="btn-group-lg">
                                                        <button class="btn btn-outline-dark " style="width: 40%" type="submit"><a href="{{ action('EventController@edit',[$event->id]) }}">Edit Event</a> </button>
                                                        <button class="btn btn-outline-danger" style="width: 40%" type="submit"><a href="#"
                                                                                                                                   onclick="
                                                         var result = confirm('Are you sure youo want to delete this Event? ');

                                                         if(result){
                                                             event.preventDefault();
                                                             document.getElementById('delete-form').submit();
                                                         }

                                                        "
                                                            >
                                                                Delete Event</a>

                                                            <form id="delete-form" action="{{action('EventController@destroy' , [$event->id])}}" method="post" style="display:none" >
                                                                <input type="hidden" name="_method" value="delete">
                                                                {{csrf_field()}}
                                                            </form>

                                                        </button>
                                                        {{--<button class="btn btn-danger" type="submit" >Delete </button>--}}
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="/storage/img/{{$event->image}}" class="img-responsive"
                                             style="width: 250px; height: 200px">
                                    </div>
                                </div>
                            @endforeach
                            {{--                            {{$events->links()}}--}}
                        @else
                            <h3 class="text-warning">NO EVENTS FOUND</h3>
                        @endif


                    </div>

                    <div class="col-md-3 sports_sidebar pull-right">

                        <div>

                            @include('include.sidebar')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
