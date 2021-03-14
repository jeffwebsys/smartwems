<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function equipments(){

        return $this->hasMany(Equipment::class);
        
    }
}
