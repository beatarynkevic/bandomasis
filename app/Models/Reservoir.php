<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Reservoir extends Model
{
    use HasFactory;

    public function reservoirMembers()
    {
    return $this->hasMany('App\Models\Member', 'reservoir_id', 'id');
    }

    // public function reservoirMember()
    // {
    //    return $this->belongsTo(Member::class, 'reservoir_id', 'id');
    // }
}
