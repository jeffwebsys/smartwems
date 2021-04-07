<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    //
    protected $fillable = [

        'equipment_id',
        'user_id',
        'ticket_id',
        'remarks'

    ]; 

    public function serviceEquipment(){

        return $this->belongsTo(Equipment::class,'equipment_id','id');
    }
    public function serviceUser(){

        return $this->belongsTo(User::class,'user_id','id');

    }
    public function serviceTicket(){

        return $this->belongsTo(Ticket::class,'ticket_id','id');

    }
    public function getTicketStatusAttribute() : string {

        $list = [
            0 => '<span class="badge outline-badge-warning"> Unassigned </span>',
            1 => '<span class="badge outline-badge-success"> Pending </span>',
            2 => '<span class="badge outline-badge-success"> Approval </span>',
            3 => '<span class="badge outline-badge-success"> Completed Request </span>',
        ];

        return $list[$this->status];

    }
    public function getTrackStatusAttribute() : string {

        $test = [
            0 => '<p>Your ticket is still unassigned</p>',
            1 => '<p>Your ticket has been picked up by maintenance personnel</p>',
            2 => '<p>Your ticket has been sent and waiting for approval</p>',
            3 => '<p>Your ticket is completed!</p>',
        ];

        return $test[$this->status];

    }

}
