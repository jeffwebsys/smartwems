<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketHistory extends Model
{
    //
    protected $fillable = [
        'ticket_id',
        'description',
        'status',
        'logs'
    ];
    public function ticket(){
        return $this->belongsTo(Ticket::class,'ticket_id','id');
    }
}
