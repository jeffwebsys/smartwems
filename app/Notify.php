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

}
