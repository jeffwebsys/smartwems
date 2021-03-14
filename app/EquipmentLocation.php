<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentLocation extends Model
{
    //
    protected $fillable = [
        'title',
        'description'
    ];

    public function equipments() {

        return $this->hasMany(Equipment::class);
    }
}
