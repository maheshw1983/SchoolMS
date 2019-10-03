<?php

namespace App\Http\Controllers;

use App\Event;
use App\Society;
use App\User;
use Faker\Provider\DateTime;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Image;
Use MaddHatter\LaravelFullcalendar\Facades\Calendar;
Use MaddHatter\LaravelFullcalendar;
Use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('from_date', 'asc')->paginate(3);

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required|max:250',
            'detailed_Description' => 'required',
            'venue' => 'required',
            'from_date' => 'required|after:yesterday',
//            'to_date' => 'required|after_or_equal:from_date',
            'from_grade' => 'required|integer|min:0|max:13',
            'to_grade' => 'required|integer|min:0|max:13',
            'act_income' => 'required|numeric|min:0|between:0,999999999.99',
            'act_expense' => 'required|numeric|min:0|between:0,99999999.99',
            'image' => 'required',
        ]);

        if($request->has('venue'))
        {
            $venue = request('venue');
            $tod = request('to_date');
            $fromd =request('from_date');

            //There is an event within the timeslot that is provided
            $eventCheck1 = Event::where('venue',$venue)
                ->where('from_date','>=', $fromd)
                ->where('to_date','<=',$tod)
                ->first();

            //The event created is within the timeslot of an events that has been created previously
            $eventCheck2 = Event::where('venue',$venue)
                ->Where('from_date','<=',$fromd )
                ->Where('to_date','>=',$tod )
                ->first();

            //To check whether the From Date Value is entered within a timeslot of an event
            $eventCheck3 = Event::where('venue',$venue)
                ->where('from_date','<=',$fromd)
                ->where('to_date', '>=' , $fromd)
                ->first();

            //To check whether the to_Date Value is entered within a timeslot of an event
            $eventCheck4 = Event::where('venue',$venue)
                ->where('from_date','<=',$tod)
                ->where('to_date', '>=' , $tod)
                ->first();

            if($eventCheck1)
            {
                return redirect()->back()->with('error' ,"{$eventCheck1->venue}&nbsp ".' is reserved FROM '."&nbsp{$eventCheck1->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck1->to_date}". ' ');

            }elseif($eventCheck2){

                return redirect()->back()->with('error' , "{$eventCheck2->venue} &nbsp".'is reserved FROM '."&nbsp{$eventCheck2->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck2->to_date}". ' ');
            }
            elseif ($eventCheck3){

                return redirect()->back()->with('error' , "{$eventCheck3->venue}&nbsp ".'is reserved FROM '."&nbsp{$eventCheck3->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck3->to_date}". ' ');
            }
            elseif($eventCheck4){

                return redirect()->back()->with('error' , "{$eventCheck4->venue} &nbsp".'is reserved FROM '."&nbsp{$eventCheck4->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck4->to_date}". ' ');
            }
        }

        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'default.png';
        }

        $event = new Event;

        $u = auth()->user();
        $soc = Society::where('email' , $u->email)->get();

//        dd($soc[0]->user_id);
//        $user = User::find($u);

        $event->title = request('title');
        $event->description = request('description');
        $event->detailed_Description = request('detailed_Description');
        $event->venue = request('venue');
        $event->from_date = request('from_date');
        $event->to_date = request('to_date');
        $event->from_grade = request('from_grade');
        $event->to_grade = request('to_grade');
        $event->society_id = $soc[0]->id;
        $event->image = $filenameToStore;
        $event->user_id = $soc[0]->user_id;
        $event->act_income = request('act_income');
        $event->act_expense = request('act_expense');

        $id = $event->id;

//        dd($user);


        $event->save();

        return redirect('/Event/myevents')->with('success', "New event '" . "{$event->title}" . "' has been created ");

    }

    public function createDemo()
    {
        $event = new Event;

        $event->title = "Sports Meet";
        $event->description = "This years sports meet will be held on the 18th of February at the School Main Grounds. With the addition of new exiting events the sports meet is expected to be much more competative and enjoyable than prevois times";
        $event->detailed_description = "This years sports meet will be held on the 18th of February at the School Main Grounds. With the addition of new exiting events the sports meet is expected to be much more competative and enjoyable than prevois times\n 
                                        As always, this year the Athletic Meet (commonly known as the “Sports Meet” by the students) will showcase a multitude of talent on the field by our young contestants. The event begins with the traditional opening ceremony. The Principal and other dignitaries, led by the College Western Band on their arrival raised the National Flag followed shortly by the National Anthem. After the official opening of the Meet contingent of school cadets will march in the College Flag which was formally received by the Principal and is handed over to the Scout Troop. The College flag is then raised by the Athletic Captain along with the house flags by the respective House Captains and the Masters – in Charge. This is followed by the singing of the School Song led by the College Choir.The lighting of the Olympic lamp and the reading of the Oath will take place soon after.";
        $event->venue = "School Grounds";
        $event->from_date = "2019-02-18 08:30:00";
        $event->to_date = "2019-02-18 04:30:00";
        $event->from_grade = 1;
        $event->to_grade = 12;
        $event->act_income = 0;
        $event->act_expense = 0;
        $event->society_id = 0;
        $event->user_id = 1;
        $event->image = 0;

//        $event->save();
//        dd($event);
        return view('event.demo')->with('event', $event);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);


        if ($id) {
            return view('event.show')->with('event', $event);
        } else {
            return "No events";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('event.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required|max:250',
            'detailed_Description' => 'required',
            'venue' => 'required',
//            'from_date' => 'required|after:yesterday',
            'to_date' => 'required|after_or_equal:from_date',
            'from_grade' => 'required|integer|min:0|max:13',
            'to_grade' => 'required|integer|min:0|max:13',
            'act_income' => 'required|numeric|min:0|between:0,999999999.99',
            'act_expense' => 'required|numeric|min:0|between:0,99999999.99',

        ]);

        $old_loc = $request->originalLocation;
        $newLoc = $request->venue;
        $updated_From = $request->from_date;
        $updated_To = $request->to_date;
        $oldFrom = $request->originalFrom;
        $oldTo = $request->originalTo;


        $updatedFrom = mb_substr($updated_From, 11, 14);
        $updatedTo = mb_substr($updated_To, 11, 14);
        $from_old = mb_substr($oldFrom, 11, 14);
        $to_old = mb_substr($oldTo, 11, 14);


        if(! ($old_loc == $newLoc) and ($updatedFrom==$from_old) and ($updatedTo and $to_old))
        {
            $venue = request('venue');
            $tod = request('to_date');
            $fromd =request('from_date');

            //There is an event within the timeslot that is provided
            $eventCheck1 = Event::where('venue',$venue)
                ->where('from_date','>=', $fromd)
                ->where('to_date','<=',$tod)
                ->first();

            //The event created is within the timeslot of an events that has been created previously
            $eventCheck2 = Event::where('venue',$venue)
                ->Where('from_date','<=',$fromd )
                ->Where('to_date','>=',$tod )
                ->first();

            //To check whether the From Date Value is entered within a timeslot of an event
            $eventCheck3 = Event::where('venue',$venue)
                ->where('from_date','<=',$fromd)
                ->where('to_date', '>=' , $fromd)
                ->first();

            //To check whether the to_Date Value is entered within a timeslot of an event
            $eventCheck4 = Event::where('venue',$venue)
                ->where('from_date','<=',$tod)
                ->where('to_date', '>=' , $tod)
                ->first(); 

            if($eventCheck1)
            {
                return redirect()->back()->with('error' ,"{$eventCheck1->venue}&nbsp ".' is reserved FROM '."&nbsp{$eventCheck1->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck1->to_date}". ' ');

            }elseif($eventCheck2){
                return redirect()->back()->with('error' , "{$eventCheck2->venue} &nbsp".'is reserved FROM '."&nbsp{$eventCheck2->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck2->to_date}". ' ');
            }
            elseif ($eventCheck3){
                return redirect()->back()->with('error' , "{$eventCheck3->venue}&nbsp ".'is reserved FROM '."&nbsp{$eventCheck3->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck3->to_date}". ' ');
            }
            elseif($eventCheck4){
                return redirect()->back()->with('error' , "{$eventCheck4->venue} &nbsp".'is reserved FROM '."&nbsp{$eventCheck4->from_date}&nbsp". ' TO &nbsp'. "{$eventCheck4->to_date}". ' ');
            }
        }

        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'default.png';
        }

        $event = Event::find($id);

        $event->title = request('title');
        $event->description = request('description');
        $event->detailed_Description = request('detailed_Description');
        $event->venue = request('venue');
        $event->from_date = request('from_date');
        $event->to_date = request('to_date');
        $event->from_grade = request('from_grade');
        $event->to_grade = request('to_grade');
        $event->image = $filenameToStore;
        $event->act_income = request('act_income');
        $event->act_expense = request('act_expense');

        $event->save();

        return redirect('/Event')->with('success', "Event '" . "{$event->title}" . "' has been updated ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if ($event) {
            $event->delete();
            return redirect('Event/myevents')->with('success', "Event '" . "{$event->title}" . "' has been deleted ");
        }

        return redirect('Event/myevents')->with('error', "Event '" . "{$event->title}" . "' has not been deleted ");
    }

    public function search()
    {
        $search = request('search');
        $events = Event::search($search)->paginate(3);

        return view('event.index')->with('events', $events)->with("success", "Search Result for '" . "{$search}" . " '");
    }

    public function liveSearch(Request $request)
    {
        dd($request);

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('events')
                    ->where('title', 'like', '%' . $query . '%')
//                    ->orWhere('description', 'like', '%' . $query . '%')
//                    ->orWhere('detailed_description', 'like', '%' . $query . '%')
//                    ->orWhere('venue', 'like', '%' . $query . '%')
                    ->orderBy('from_date', 'desc')
                    ->get();

            } else {
                $data = DB::table('events')
                    ->orderBy('date_from', 'desc')
                    ->get();
            }

            $total_row = $data->count();

            if ($total_row > 0) {

                foreach ($data as $row) {
                    $output .= '
                                <tr>
                                 <td>' . $row->title . '</td>
                                 <td>' . $row->description . '</td>
                                 <td>' . $row->detailed_description . '</td>
                                 <td>' . $row->venue . '</td>
                                </tr>
                                ';
                }

            } else {

                $output = '
                           <tr>
                            <td align="center" colspan="5">No Data Found</td>
                           </tr>
                           ';
            }

            $data = array(

                'table_data' => $output,
                'total_data' => $total_row
            );

            dd($data);

            echo json_encode($data);
        }
    }

    public function myevents()
    {
        if (auth()->user()) {
            $user = Auth::user();

            $id = $user->id;
            $name = $user->name;

            if($user -> role_id == 4){

                $soc = Society::where('email' , $user->email)->get();
                $id = $soc[0]->id;
            }

            $events = Event::orderBy('created_at', 'desc')->where('user_id', $id)->orWhere('society_id', $id )->paginate(3);

            return view('event.myevents')->with('events', $events)->with('success', "Showing events of '" . "{$name}" . "' .");
        }

        return redirect('/Event');

    }

    public function showEvent($id)
    {
        $event = Event::find($id);


        if ($id) {
            return view('event.show')->with('event', $event);
        } else {
            return "No events";
        }

    }

    public function updateImage(Request $request, $id)
    {
        if ($request->hasFile('image')) ;
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('public/img', $filename);

//        $image = $request->file('image');
//        $filename = time(). '.' . $image->getClientOriginalExtension();
//        Image::make($image)->resize(200 , 250 )->store(public_path('/event_images','$filename'));

//        $user = Auth::user();
//        $user->image = $filename;
//        $user->save();

            $event = Event::find($id);
            $event->image = $filename;
            $event->save();
        }


        return view('event.show')->with('event', $event);
    }

    public function calendar()
    {
        $events = Event::all();

        foreach ($events as $key => $event) {

            $e_list = [];

            $e_list[] = Calendar::event(
                $event->title,
                false,
                new \DateTime($event->from_date),
                new \DateTime($event->to_date)
//                (action('EventController@show',[$event->id]))
            );

            $cal_events = Calendar::addEvents($e_list);
        }

        return view('event.calendar')->with('cal_events', $cal_events);

    }

    public function monthlyEvent()
    {
        $events = Event::latest()
            ->filter(request(['month', 'year']));

        $events = $events->get();

        return view('event.monthlyEvent', compact('events'));

    }


}
