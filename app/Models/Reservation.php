<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'reservation_code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
    
}
