@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{asset('/css/soc_card.css')}}">


    <div class="col-md-12">

        <div class="row">

            <div class="col-md-3">

                @include('society.sidebar')

            </div>

            <div class="col-md-9">
                <div class="col-md-12 rounded " style="padding-top:1%">
                    <div class="row row-margin-bottom">
                        @foreach($societies as $society)

                            <div class=" col-md-5" style="margin: 1%">
                                <aside class="profile-card">
                                    <header>

                                        <!-- here’s the avatar -->
                                        <a href="{{route('Society.show', $society->id )}}">
                                            <img src="storage/img/{{$society->image}}" height="200px">
                                        </a>

                                        <!-- the username -->
                                        <h1>{{$society->title}}</h1>

                                        <!-- and role or location -->
                                        <h2>-Meetings are on {{$society->meetingsOn}} -</h2>

                                    </header>

                                    <!-- bit of a bio; who are you? -->
                                    <div class="profile-bio">

                                        <div class="" style="padding: 2%; background-color: #bfbfbf">
                                            <div class="row" style="margin: 1%">
                                                <button class="btn btn-primary" type="submit" style="margin: 2%"
                                                        value="Learn More"><a style="color: whitesmoke;"
                                                                              href="{{route('Society.show', $society->id )}}">Learn
                                                        More
                                                    </a>
                                                </button>

                                                @if(AUth()->user())
                                                    @if(Auth()->user()->id == $society->user_id || Auth()->user()->role_id == 1 )
                                                        <button class="btn bg-info" type="Submit" style="margin: 2%"><a
                                                                    class="text-white"
                                                                    href="{{ action('SocietyController@edit',[$society->id]) }}">Edit
                                                                Society</a>

                                                        </button>
                                                        <button class="btn btn-danger  float-right" type="Submit"
                                                                style="margin: 2%">
                                                            <a class="text-white" href="#"
                                                               onclick="
                                                                                     var result = confirm('Are you sure youo want to delete this Event? ');

                                                                                     if(result){
                                                                                         event.preventDefault();
                                                                                         document.getElementById('delete-form').submit();
                                                                                     }">Delete Event</a>
                                                            <form id="delete-form"
                                                                  action="{{action('SocietyController@destroy' , [$society->id])}}"
                                                                  method="post" style="display:none">
                                                                <input type="hidden" name="_method"
                                                                       value="delete">
                                                                {{csrf_field()}}
                                                            </form>

                                                        </button>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </aside>

                                <div>
                                    <h3 style="font-family: Bahnschrift">
                                        {{$society->title}}
                                    </h3>

                                </div>
                            </div>



                            <!-- that’s all folks! -->
                            <div class="col-md-1"></div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>


@endsection
