<?php

namespace App\Http\Controllers;
use Auth;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = \App\Event::orderBy('id', 'DESC')->get();
        //dd($stations);
        return view('pm.listEvent', compact('events'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->only('title','date_start', 'seat','date_end','points','description','link');
        //dd($data['status']);
        $event = Event::create([
            'title' => $data['title'],
            'date_start' => $data['date_start'],
            'date_end' => $data['date_end'],
            'points' => $data['points'],
            'seat' => $data['seat'],
            'points' => $data['points'],
            'link' => $data['link'],
            'description' => $data['description'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('event.index', $event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            
            'title' => request('title'),
            'date_start' => request('date_start'),
            'date_end' => request('date_end'),
            'points' => request('points'),
            'seat' => request('seat'),
            'description' => request('description'),

        ]);

        $event = \App\Event::updateOrCreate([
            'title' => $request->title,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'points' => $request->points,
            'seat' => $request->seat,
            'description' => $request->description,
        ]);

        return redirect()->route('event.show', $event);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index');

    }
    public function listFilter()
    {
        //$filter = $request->filter;
        $events1 = \App\Event::orderBy('created_at','DESC')->get();
        //dd($stations);
        return view('event.eventList', compact('events1'));
    }

    


}
