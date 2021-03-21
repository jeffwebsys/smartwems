<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    //

    protected $fillable = [

                'user_id',
                'equipment_id',
                'ticket_id',
                'attachment'
    ];

    public function procurementUser() {
        return $this->belongsTo(User::class, 'user_id','id');
    }

      public function procurementEquipment() {
        return $this->belongsTo(Equipment::class, 'equipment_id','id');
    }

     public function procurementTicket() {
        return $this->belongsTo(Ticket::class, 'ticket_id','id');
    }

    public function getTixStatusAttribute() : string {

        $list = [
            0 => '<span class="badge outline-badge-warning"> Unassigned </span>',
            1 => '<span class="badge outline-badge-success"> Pending </span>',
            2 => '<span class="badge outline-badge-success"> For Approval </span>',
            3 => '<span class="badge outline-badge-success"> Completed Request </span>',
        ];

        return $list[$this->procurementTicket->status];

    }
}
