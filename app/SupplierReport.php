<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierReport extends Model
{
    //
    protected $fillable = [

        'report',
        'procurement_id',

    ];

    public function procurement(){

        return $this->belongsTo(Procurement::class,'procurement_id','id');
    }
}
