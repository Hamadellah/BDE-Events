<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ShowTicket(){
        $userid=auth()->id();
        $ticket=DB::select("SELECT events.title ,events.start_time,events.end_time,events.location, tickets.ticket_code , events.event_date, reservations.reservation_code 
FROM tickets
JOIN reservations on tickets.reservation_id=reservations.id
JOIN events on reservations.event_id=events.id
WHERE reservations.user_id=$userid");
        return view("/dashboard/MesBillets",compact("ticket"));
       
    }
}
style: improve dashboard interface
