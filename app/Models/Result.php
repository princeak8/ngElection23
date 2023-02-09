<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    public function partyResults()
    {
        return $this->hasMany('App\Models\PartyResult');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function party()
    {
        return $this->belongsTo('App\Models\Party');
    }
}
