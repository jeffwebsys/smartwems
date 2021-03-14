<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    //

    protected $fillable = [
        'user_id',
        'ticket_id',
        'equipment_id',
        'staff_name'
    ];

    public function userTicket(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function ticketOwner(){
         return $this->belongsTo(Ticket::class,'ticket_id','id');
        }
    public function equipmentOwner(){
        return $this->belongsTo(Equipment::class,'equipment_id','id');
    }
    public function getTixStatusAttribute() : string {

        $list = [
            0 => '<span class="badge outline-badge-warning"> Unassigned </span>',
            1 => '<span class="badge outline-badge-success"> Pending </span>',
            2 => '<span class="badge outline-badge-success"> Approval </span>',
            3 => '<span class="badge outline-badge-success"> Completed Request </span>',
        ];

        return $list[$this->ticketOwner->status];

    }
 }
