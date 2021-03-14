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
}
