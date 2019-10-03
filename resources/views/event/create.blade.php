@extends('layout')


@section('content')

    <div class="container-fluid">

        <div class="row  container-fluid">
            <div class="col-md-9">

                <h1 class="text-light text-center card-header">Create Event</h1>

                <form action="{{ action('EventController@store')}}" method="post" enctype="multipart/form-data">
                    <label type="hidden">{{csrf_field()}}</label>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="Text" name="title" class="form-control" value="{{old('title')}}"
                               id="exampleInputPassword1" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="teacherInCharge">Society ID </label>
                        <input type="disabled" name="teacherInCharge" class="form-control" id="exampleInputPassword1"
                               placeholder="Enter Title" value="{{auth()->user()->id}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="3" type="TextArea" name="description" value="{{old('description')}}"
                                  class="form-control" aria-describedby="emailHelp"
                                  placeholder="Enter a Brief Description  (250)" maxlength="250"
                                  required></textarea><span class="text-warning" id='remainingC'></span>
                    </div>

                    {{-- Script to get the number of characters remaining--}}
                    <script>
                        $('textarea').keypress(function () {

                            if (this.value.length > 250) {
                                return false;
                            }
                            $("#remainingC").html("Remaining characters : " + (250 - this.value.length));
                        });
                    </script>
                    {{------------------------------------------------------------------------------------------------}}

                    <div class="form-group">
                        <label for="detailedDescription">Detailed Description</label>
                        <textarea rows="10" type="Text" class="form-control" value="{{old('detailed_Description')}}"
                                  name="detailed_Description" aria-describedby="emailHelp"
                                  placeholder="Enter a Detailed Description" required></textarea>
                    </div>

                    <?php
                        $events = \App\Event::whereNotNull('venue')->get();
                        $locations=null;

                        foreach ($events as $event)
                            {
                                $locations = $event->venue;
                            }
                    ?>

                    <div class="form-group">
                        <label for="venue">Venue</label>
                        {{--<input type="Text" class="form-control" name="venue" value="{{old('venue')}}"--}}
                               {{--id="exampleInputPassword1" placeholder="Enter Venue" required>--}}
                        <input class="form-control" name="venue" type="Text" list="locations" placeholder="Select or Type Your Location"  required/>
                        <datalist id="locations">
                            <option value="School Main Hall">School Main Hall</option>
                            <option value="School Grounds">School Grounds</option>
                            <option value="Auditorium">Auditorium</option>
                            {{--@if($locations)--}}
                                {{--@foreach($locations as $Location)--}}
                                    {{--<option value="{{$Location}}">{{$Location}}</option>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        </datalist>
                    </div>

                    <div class="form-group col-md-7" style="padding-bottom:3%;padding-top:3%">
                        <div class="col-md-6 float-left">
                            <label for="fromGrade">From (Grade)</label>
                            <input type="Number" class="form-control" name="from_grade" value="{{old('from_grade')}}"
                                   aria-describedby="emailHelp"
                                   placeholder="Lowest Grade that is permitted to participate" required>
                        </div>
                        <div class="col-md-6 float-left">
                            <label for="toGrade">To (Grade)</label>
                            <input type="Number" class="form-control" name="to_grade" value="{{old('to_grade')}}"
                                   aria-describedby="emailHelp"
                                   placeholder="Highest Grade that is permitted to participate" required>
                        </div>
                    </div>

                    <div class="form-group col-md-7" style="padding-bottom:3%;padding-top:3%">
                        {{--<h4 class="col-md-12">The Event is held on: </h4>--}}
                        <div class="col-md-6 float-left">
                            <label for="example-time-input" class="col-2 col-form-label">From</label>
                            <div>
                                <input class="form-control" name="from_date" type="datetime-local"
                                       value="2018-10-04T09:30:00" id="example-time-input" required>
                            </div>
                        </div>
                        <div class="col-md-6 float-right">
                            <label for="example-time-input" class="col-2 col-form-label">To</label>
                            <div>
                                <input class="form-control" name="to_date" type="datetime-local"
                                       value="2018-10-04T10:30:00" id="example-time-input" required>
                            </div>
                        </div>

                    </div>

                    <div class="form-group " style="padding-top:3%">
                        <label for="act_income" class="col-2 col-form-label">Actual Income</label>
                        <div>
                            <input class="form-control" name="act_income" type="double" value="{{old('act_income')}}"
                                   id="example-time-input" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="act_expense" class="col-2 col-form-label">Actual Expense</label>
                        <div>
                            <input class="form-control" name="act_expense" type="double" value="{{old('act_expense')}}"
                                   id="example-time-input" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="image" value="{{old('image')}}" class="btn btn-outline-dark">
                    </div>
                    {{--<div class="badge-warning card-header " style="margin: 15px">*Image can be changed after submitting the form</div>--}}
                    <div class="btn-block" style="padding-bottom:3%;padding-top:3%">
                        <button type="Submit" class="btn btn-primary btn-block" style="padding: 1%"><h3></h3>Submit
                        </button>
                        <br>
                    </div>

                </form>
            </div>
            <div class="col-md-3 sports_sidebar">


                @include('include.sidebar')
            </div>
        </div>
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>

@endsection

