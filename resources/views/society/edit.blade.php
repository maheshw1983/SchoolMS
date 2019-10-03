@extends('layout')

@section('content')

    <div class="col-md-12 row">
        <div class="col-md-3">
            @include('society.sidebar')
        </div>

        <div class="col-md-9">
            {{--{{ route('user.settings', $nickname) }}"--}}

            <form action="{{route('Society.update' ,$society->id ) }}" method="post"  enctype="multipart/form-data"> {{--has used route instead of ACTION--}}
                <label type="hidden">{{csrf_field()}}</label>
                {{method_field('put')}}

                <div class="form-group">
                    <label for="exampleInputPassword1"><h6>Society Name</h6></label>
                    <input type="Text" name="title" class="form-control" value="{{$society->title}}"
                           id="exampleInputPassword1" placeholder="Enter Title" >
                </div>
                <div class="form-group">
                    <label for="venue"><h6>Teacher In Charge</h6></label>
                    <input class="form-control" name="teacherInCharge" type="Text" value="{{old('teacherInCharge')}}" list="teachers" placeholder="Select Teacher in Charge"  required/>
                    <datalist id="teachers">
                        {{--<option value="School Main Hall">School Main Hall</option>--}}
                        {{--<option value="School Grounds">School Grounds</option>--}}
                        {{--<option value="Auditorium">Auditorium</option>--}}
                        @if($teachers)
                            @foreach($teachers as $teach)
                                <option value="{{$teach->id}}"> Teacher Name is {{$teach->name}}</option>
                            @endforeach
                        @endif
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="detailedDescription"><h6>Description</h6></label>
                    <textarea rows="10" type="Text" class="form-control" value="{{$society->description}}}"
                              name="description" aria-describedby="emailHelp"
                              placeholder="A proper explanation about the Society" required>{{$society->description}}}</textarea>
                </div>
                <div class="form-group">
                    <label for="detailedDescription"><h6>Mission and Vision</h6></label>
                    <textarea rows="4" type="Text" class="form-control" value="{{$society->mission}}"
                              name="mission" aria-describedby="emailHelp"
                              placeholder="Vision and Mission of the society" required>{{$society->mission}}</textarea>
                </div>

                <div class="form-group">
                    <label for="venue"><h6>Practice Location</h6></label>
                    <input class="form-control" name="venue" type="Text" value="{{$society->location}}" list="locations" placeholder="Select or Type Your Location"  required/>
                    <datalist id="locations">
                        <option value="School Main Hall">School Main Hall</option>
                        <option value="School Grounds">School Grounds</option>
                        <option value="Auditorium">Auditorium</option>
                    </datalist>
                </div>

                <div class="form-group col-md-7" style="padding-bottom:3%;padding-top:3%">
                    <h3>Meeting Time</h3>
                    <div class="col-md-6 float-left">
                        <label for="fromGrade"><h6>From </h6></label>
                        <input type="time" class="form-control" name="from" value="{{$society->from}}"
                               placeholder="Start time of the meeting" required>
                    </div>
                    <div class="col-md-6 float-left">
                        <label for="toGrade"><h6>To (Grade)</h6></label>
                        <input type="time" class="form-control" name="to" value="{{$society->to}}"
                               placeholder="End time of the meeting" required>
                    </div>
                </div>


                <input value="{{$society->from}}" type="hidden" name="originalFrom">
                <input value="{{$society->to}}" type="hidden" name="originalTo" >
                <input value="{{$society->location}}" type="hidden" name="originalLocation">

                <br>
                <br>
                <br>
                <div class="form-group col-md-12 ">
                    <div class="col-md-12">
                        <label><h6>Meetings On :&nbsp</h6></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="meetingsOn[]" id="Monday" value="Monday" <?php if(in_array("Monday", $checkbox)){ echo " checked=\"checked\""; } ?>>
                            <label class="form-check-label" checked >Monday</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="meetingsOn[]" id="Tuesday" value="Tuesday" <?php if(in_array("Tuesday", $checkbox)){ echo " checked=\"checked\""; } ?> >
                            <label class="form-check-label" >Tuesday</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="meetingsOn[]" id="Wednesday" value="Wednesday" <?php if(in_array("Wednesday", $checkbox)){ echo " checked=\"checked\""; } ?>>
                            <label class="form-check-label" >Wednesday</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="meetingsOn[]" id="Thursday" value="Thursday" <?php if(in_array("Thursday", $checkbox)){ echo " checked=\"checked\""; } ?>>
                            <label class="form-check-label" >Thursday</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="meetingsOn[]" id="Friday" value="Friday" <?php if(in_array("Friday", $checkbox)){ echo " checked=\"checked\""; } ?>>
                            <label class="form-check-label" >Friday</label>
                        </div>

                        <button class="btn" type="reset" style="border-radius: 50%">Uncheck All Days</button>
                    </div>
                </div>
                <br>
                <div class="col-md-12 float-left"  style="padding-bottom:3%;padding-top:1%">
                    <input type="file" name="image" value="{{$society->image}}" class="btn btn-outline-dark" required>
                    {{--<p class="text-warning">*Encouraged to enter a gif (Live Image)</p>--}}
                </div>
                <div class="btn-block" style="padding-bottom:3%;padding-top:3%">
                    <button type="Submit" class="btn btn-primary btn-block" style="padding: 1%">Submit
                    </button>
                    <br>
                </div>

            </form>

    </div>

@endsection
