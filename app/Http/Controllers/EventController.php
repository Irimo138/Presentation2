<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = DB::table('events')
        ->where('checked', 1)
            ->take(20)
            ->get();
    
        return view('main', ['eventList'=> $events]);
    }

    public function shownotChecked(){
        $events = DB::table('events')
        ->where('checked', 0)
        ->simplePaginate(10);
        return view('notChecked',[ 'events' => $events]);

    }
    public function showchecked(){
        $events = DB::table('events')
        ->where('checked', 1)
        ->simplePaginate(10);
        return view('checkedEvents',[ 'events' => $events]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event=new Event();
       
        $request->validate([
            'date' => 'required|date|after:tomorrow',

            'hour'=> 'required',
            
            'name' => 'unique:events,name,NULL,id,date,'.request('date'),
        
            
            'language' => 'required|max:20|min:2|alpha',
            
            'price'=>'required',
            'url'=>'required|url',
            'townName'=>'required',
            'image'=>'required|url',
        ]);

        $event->name = $request->name;
        $event->language = $request->language;
        $event->type = $request->type;
        $event->date = $request->date;
        $event->hour = $request->hour;
        $event->price = $request->price;
        $event->url = $request->url;
        $event->image = $request->image;
        $event->townName = $request->townName;
        $event->checked = TRUE;
        $event->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type= Type::all();
        $eventEdit = Event::findOrFail($id);
        return view ('editEvent', ['event'=>$eventEdit,'typeList'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $event = Event::findOrFail($id);
        $event->name = $request->name;
        $event->language = $request->language;
        $event->type = $request->type;
        $event->date = $request->date;
        $event->hour = $request->hour;
        $event->price = $request->price;
        $event->url = $request->url;
        $event->image = $request->image;
        $event->townName = $request->townName;
        $event->checked = TRUE;
        $event->save();
        return redirect('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('home');
    }
    public function showUser($id)
    {
        
        $eventEdit = Event::findOrFail($id);
        return view ('eventShowUser', ['event'=>$eventEdit]);
    }
}
