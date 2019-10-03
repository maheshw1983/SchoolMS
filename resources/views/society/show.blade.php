@extends('layout')

@section('content')


    <div class=" row col-12">
        <div class="col-3  ">

            @if(Auth()->user())
                @if($society)
                    @if(Auth()->user()->id == $society->user_id){{-- If the user is a teacher only they can check enrolled students --}}
                    <div class="col-md-12 rounded row sports_sidebar" style="padding:3%;margin:1%">
                        <div class="col-lg-12" style="margin:2%">
                            <form id="add-user"
                                  action="{{action('SocietyController@enrolledStudents')}}">
                                <div class="input-group">
                                    {{csrf_field()}}
                                    <input type="submit" class="btn btn-primary col-12 "
                                           value="Students enrolled for {{$society->title}}"
                                           name="user_id">
                                    <input value="{{$society->id}}" type="hidden" name="society_id">
                                    <input value="{{Auth()->user()->id}}" type="hidden" name="user_id">
                                </div>
                            </form>

                        </div>
                    </div>
                    {{--@endif--}}
                    @endif
                @endif
            @endif

            @include('society.sidebar')
        </div>

        <?php
        //To check whether the Student is already enrollef
        if (Auth()->user() && $society ) {
            $thisUser = \Illuminate\Support\Facades\Auth::user()->id;
            $thisSociety = \App\Society::find($society->id);
            $userExist = \Illuminate\Support\Facades\DB::table('society_user')
                ->where('user_id', $thisUser)
                ->where('society_id', $thisSociety->id)
                ->first();
        }

        ?>

        <div class="col-md-9 rounded " style="background-color: #d0d0d0; padding:2%;">
            @if($society)
                <div class="row">
                    <div class="col-12 rounded card-header text-uppercase text-lg-center"><h1
                                style="font-family: 'DejaVu Sans Mono'">{{$society->title}}</h1></div>
                </div>

                <div class="row col-12 rounded" style="background-color: #a9a9a9; padding: 2%; color: whitesmoke">
                    <div class="col-4" style="">
                        <img src="/storage/img/{{$society->image}}" style="width:100%; height: 100%;">
                    </div>
                    <div class="col-8">
                        <div class="card-header col-12 rounded" style="background-color: dimgrey">
                            Mission & Vision Of The {{$society->title}} is
                        </div>
                        <div class="card-body col-12 rounded" style="background-color: #8d8d8d">
                            {{$society->mission}}

                            <div class="col-12">
                                @if(Auth()->user())
                                    @if(Auth()->user()->role_id == 3 )
                                        @if($userExist)
                                            <div class="col-md-12" style="margin:2%">
                                                <form id="add-user"
                                                      action="{{action('SocietyController@removeStudent' , [$society->id])}}"
                                                      method="post">
                                                    <div class="input-group">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <input type="submit" class="btn btn-primaryn"
                                                               value="Un-Enroll Myself">
                                                        <input value="{{$society->id}}" type="hidden" name="society_id">
                                                        <input value="{{Auth()->user()->id}}" type="hidden"
                                                               name="user_id">
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12" style="margin:2%">
                                                    <form id="add-user"
                                                          action="{{action('SocietyController@addStudent' , [$society->id])}}"
                                                          method="post">
                                                        <div class="input-group">
                                                            {{csrf_field()}}
                                                            <input type="submit" class="btn btn-primaryn"
                                                                   value="Enroll Myself">
                                                            <input value="{{$society->id}}" type="hidden"
                                                                   name="society_id">
                                                            <input value="{{Auth()->user()->id}}" type="hidden"
                                                                   name="user_id">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                                @if(Auth()->user())
                                    @if(Auth()->user()->id == $society->user_id)
                                        <button class="btn bg-info" type="Submit" style="margin: 2%"><a
                                                    class="text-white"
                                                    href="{{ action('SocietyController@edit',[$society->id]) }}">Edit
                                                society</a>

                                        </button>
                                        <button class="btn btn-danger  float-right" type="Submit" style="margin: 2%">
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
                </div>
                <div class="row col-12">
                    @if(Auth()->user())
                        @if($userExist || Auth()->user()->role_id == 2)
                            <div class="col-md-12" style="margin:2%">
                                <div class="row">
                                    <div class="card-header col-3 rounded text-white" style="background-color: dimgrey">
                                        Meetings On
                                    </div>
                                    <div class="row col-9 rounded"
                                         style="background-color: #a9a9a9; padding: 2%; color: whitesmoke">
                                        From {{$society->from}} To {{$society->to}} <br> On {{$society->meetingsOn}}
                                        <br>
                                        At The {{$society->location}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-header col-3 rounded text-white" style="background-color: dimgrey">
                                        Description
                                    </div>
                                    <div class="row col-9 rounded"
                                         style="background-color: #a9a9a9; padding: 2%; color: whitesmoke">
                                        {{$society->description}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            @else
                <div class="row col-12">
                    <h1>Society Information is not available</h1>
                </div>
            @endif
        </div>


    </div>

@endsection
