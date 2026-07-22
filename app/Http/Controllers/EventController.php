<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class EventController extends Controller
{
    public function showform(){
        return view("formevent");
    }
    public function StoreEvent(Request $request){
        $user=auth()->id();
        
        $title=$request->input("title");
        $description = $request->input("description");
        $event_date = $request->input("event_date");
        $starr_time = $request->input("starr_time");
        $end_time = $request->input("end_time");
        $price = $request->input("price");
        $location = $request->input("location");
        $capacity = $request->input("capacity");
        $request->validate([
            "title" => "required",
            "description" => "required|max:255",
            "event_date" => "required|date|after_or_equal:today",
            "starr_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i",
            "location" => "required",
            "price" => "required|numeric|min:0",
            "capacity" => "required|integer|min:1"
        ]);
        Event::create([
            "title" => $title,
            "description" => $description,
            "event_date" => $event_date,
            "start_time" => $starr_time,
            "end_time" => $end_time,
            "location" => $location,
            "price" => $price,
            "capacity" => $capacity,
            "created_by" => $user

        ]);
        return redirect()->route("index")->with("success","Event created successfully");
    }
    public function TableBord(){
        $event= Event::withCount('reservation')->get();
        return redirect()->route("index",compact("event"));
    }

}
