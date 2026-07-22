<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use illuminate\support\str;

class ReservationController extends Controller
{
 public function reserve($id)
 {
    $user=auth()->id();
    $eventid=$id;
    $event=Event::findOrFail($id);
    $exestinguser=Reservation::all()->where("user_id",$user)->where("event_id",$eventid)->first();
    if( $exestinguser){
        return redirect()->back()->with("message","you are al ready reserved this a place in this event ");
    }
    $reserved = Reservation::where("event_id",$id)->count();
    if($reserved>=$event->capacity){
        return redirect()->back()->with("message","the event is full");
    }
    Reservation::create([
        "user_id" => $user,
        "event_id" => $eventid,
        "reservation_code" => Str::random(10)
    ]);
 return redirect()->back()->with("message","you are reserved a place in this event successfully");  
 }
}
