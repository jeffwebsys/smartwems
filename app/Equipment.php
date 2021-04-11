<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //
    protected $fillable = [

        'equipment_categories_id',
        'equipment_locations_id',
        'item_name',
        'item_description',
        'model_no',
        'serial_no',
        'property_no',
        'ac_date',
        'unit_cost',
        'res_personnel',
        'remarks',
        'last_pm',
        'next_pm',
        'status',
        
    ];


    public function eqcategory(){

        return $this->belongsTo(EquipmentCategory::class,'equipment_categories_id','id');
    }

    public function eqlocation() {

        return $this->belongsTo(EquipmentLocation::class,'equipment_locations_id','id');
    }

    public function equipmentTicket() {
        return $this->hasOne(Ticket::class);
    }
    public function purchaseBudget() {
        return $this->hasOne(PurchaseRequest::class);
    }

     public function getTicketStatusAttribute() : string {

        $list = [
            0 => '<span class="badge badge-warning"> Unassigned </span>',
            1 => '<span class="badge badge-success"> Pending </span>',
            2 => '<span class="badge badge-success"> For Approval </span>',
            3 => '<span class="badge badge-success"> Completed Request </span>',
        ];

        return $list[$this->equipmentTicket->status];

    }
    public function getEquipmentStatusAttribute() : string {

        $list = [
            0 => '<span class="badge badge-warning"> Inactive </span>',
            1 => '<span class="badge badge-success"> Active </span>',
            2 => '<span class="badge badge-warning"> Unassigned </span>',
            3 => '<span class="badge badge-success"> Pending </span>',
            4 => '<span class="badge badge-success"> For Approval </span>',
            5 => '<span class="badge badge-success"> Completed Request </span>',
        ];

        return $list[$this->status];

    }
}
