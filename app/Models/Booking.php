<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
   // protected $table = 'bookings';

    public function bookingAgent(){
    	return $this->belongsTo('App\Models\Agent','agent_id','id'); 
    }

    public function block(){
    	return $this->belongsTo('App\Models\Block','block_id','id'); 
    }
}
