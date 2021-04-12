<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservoir;

class Member extends Model
{
    use HasFactory;

    public function memberReservoirs()
    {
    return $this->belongsTo(Reservoir::class, 'reservoir_id', 'id');
    }

    // public function memberReservoirList()
    // {
    //     return $this->hasMany('App\Models\Reservoir', 'id', 'author_id');
    // }
}
