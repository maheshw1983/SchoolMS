@extends('layout')


@section('content')

    <div class="container-fluid">

        <div class="row  container-fluid">
            <div class="col-md-9">

                @if($event)
                    <h1 class="text-light text-center card-header">Create Demo Event</h1>

                    <form action="{{ action('EventController@store')}}" method="post" enctype="multipart/form-data">
                        <label type="hidden">{{csrf_field()}}</label>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Title</label>
                            <input type="Text" name="title" value="{{$event->title}}" class="form-control"
                                   id="exampleInputPassword1"
                                   placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <label for="teacherInCharge">Teacher ID </label>
                            <input type="disabled" name="teacherInCharge" class="form-control"
                                   id="exampleInputPassword1" placeholder="Enter Title" value="{{$event->user_id}}"
                                   disabled>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="3" type="TextArea" name="description"
                                      class="form-control"
                                      aria-describedby="emailHelp" value="{{$event->description}}" placeholder="Enter a Brief Description  (250)"
                                      maxlength="250" required>{{$event->description}}</textarea><span
                                    class="text-warning" id='remainingC'></span>
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
                        {{----}}

                        <div class="form-group">
                            <label for="detailedDescription">Detailed Description</label>
                            <textarea rows="10" type="Text" class="form-control"
                                      name="detailed_Description"
                                      aria-describedby="emailHelp" placeholder="Enter a Detailed Description"
                                      required>{{$event->detailed_description}}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Venue</label>
                            {{--<input type="Text" class="form-control" value="{{$event->venue}}" name="venue"--}}
                            {{--id="exampleInputPassword1"--}}
                            {{--placeholder="Enter Venue" required>--}}
                            <input class="form-control" name="venue" type="Text" value="{{$event->venue}}" list="locations" placeholder="Select or Type Your Location" required />
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
                            {{--<h4 class="col-md-12">Age group of the students allowed to participate: </h4>--}}
                            <div class="col-md-6 float-left">
                                <label for="fromGrade">From (Grade)</label>
                                <input type="Number" class="form-control" value="{{$event->from_grade}}"
                                       name="from_grade" aria-describedby="emailHelp"
                                       placeholder="Lowest Grade that is permitted to participate" required>
                            </div>
                            <div class="col-md-6 float-left">
                                <label for="toGrade">To (Grade)</label>
                                <input type="Number" class="form-control" value="{{$event->to_grade}}" name="to_grade"
                                       aria-describedby="emailHelp"
                                       placeholder="Highest Grade that is permitted to participate" required>
                            </div>
                        </div>

                        <?php

                        $to = new \DateTime($event->to_date);
                        $resulto = $to->format('Y-m-d H:i:s');

                        $tostr1 = mb_substr($resulto, 0, 10);
                        $tostr2 = mb_substr($resulto, 11);

                        $newto = $tostr1 . $tostr2;

                        $finalto = substr_replace($newto, 'T', 10, 0);

                        $from = new \DateTime($event->from_date);
                        $resultfrom = $from->format('Y-m-d H:i:s');

                        $fromstr1 = mb_substr($resultfrom, 0, 10);
                        $fromstr2 = mb_substr($resultfrom, 11);

                        $newfrom = $fromstr1 . $fromstr2;

                        $finalfrom = substr_replace($newfrom, 'T', 10, 0);
                        ?>

                        <div class="form-group col-md-7" style="padding-bottom:3%;padding-top:3%">
                            {{--<h4 class="col-md-12">The Event is held on: </h4>--}}
                            <div class="col-md-6 float-left">
                                <label for="example-time-input" class="col-2 col-form-label">From</label>
                                <div>

                                    <input class="form-control" value="{{$finalfrom}}" name="from_date"
                                           type="datetime-local" id="example-time-input" required>
                                </div>
                            </div>
                            <div class="col-md-6 float-right">
                                <label for="example-time-input" class="col-2 col-form-label">To</label>
                                <div>
                                    <input class="form-control" value="{{$finalto}}" name="to_date"
                                           type="datetime-local"
                                           id="example-time-input" required>
                                </div>
                            </div>

                        </div>

                        <div class="form-group " style="padding-top:3%">
                            <label for="act_income" class="col-2 col-form-label">Actual Income</label>
                            <div>
                                <input class="form-control" value="{{$event->act_income}}" name="act_income"
                                       type="double" id="example-time-input"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="act_expense" class="col-2 col-form-label">Actual Expense</label>
                            <div>
                                <input class="form-control" value="{{$event->act_expense}}" name="act_expense"
                                       type="double" id="example-time-input"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <input type="file" value="{{$event->image}}" name="image" class="btn btn-outline-dark">
                        </div>
                        {{--<div class="badge-warning card-header " style="margin: 15px">*Image can be changed after submitting the form</div>--}}
                        <div class="btn-block" style="padding-bottom:3%;padding-top:3%">
                            <button type="Submit" class="btn btn-primary btn-block" style="padding: 1%"><h3></h3>Create
                                Event
                            </button>
                            <br>
                        </div>

                        <input value="{{$finalfrom}}" type="hidden" name="originalFrom">
                        <input value="{{$finalto}}" type="hidden" name="originalTo" >
                        <input value="{{$event->venue}}" type="hidden" name="originalLocation">


                    </form>
                @endif
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

