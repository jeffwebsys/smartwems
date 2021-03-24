<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    //
    protected $fillable = [

        'equipment_id',
        'ticket_id',
        'procurement_id',
        'user_id',
        'approved_by',
        'remarks',
        'budget'
    
    ];

    public function purchaseEquipment() {

        return $this->belongsTo(Equipment::class, 'equipment_id', 'id');

    }
    public function purchaseTicket() {

        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');

    }
    public function purchaseProcurement() {

        return $this->belongsTo(Procurement::class, 'procurement_id', 'id');

    }
    public function purchaseUser() {

        return $this->belongsTo(User::class, 'user_id', 'id');

    }
}
