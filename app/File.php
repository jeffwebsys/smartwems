<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    protected $fillable = [

        'title',
        'procurement_id'
    ];

    public function procurementFile() {
        return $this->belongsTo(Procurement::class, 'procurement_id', 'id');
    }
}
