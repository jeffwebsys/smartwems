<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [

        'equipment_id',
        'name',
        'staff_id',
        'reason',
        'status'
    ]; 

    public function eqticket(){

        return $this->belongsTo(Equipment::class,'equipment_id','id');
    }
    public function ticketuser(){

        return $this->belongsTo(User::class,'staff_id','id');

    }
    public function notifyTicket(){

        return $this->hasMany(Notify::class);

    }
    public function getTicketStatusAttribute() : string {

        $list = [
            0 => '<span class="badge badge-warning"> Unassigned </span>',
            1 => '<span class="badge badge-success"> Pending </span>',
            2 => '<span class="badge badge-success"> For Approval </span>',
            3 => '<span class="badge badge-success"> Completed Request </span>',
        ];

        return $list[$this->status];

    }
    public function scopeReq($query, $value)
    {
        return $query->where('status', $value);
    }
    public function logs()
    {
        return $this->hasMany(TicketHistory::class);
    }
}
