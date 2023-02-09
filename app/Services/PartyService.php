<?php

namespace App\Services;

use App\Models\Party;

class PartyService
{

    public function getParty($id)
    {
        return Party::find($id);
    }

    public function getPartyByName($name)
    {
        return Party::where('name', $name)->first();
    }

    public function getParties()
    {
        return Party::all();
    }

    public function save($data)
    {
        return Party::firstOrCreate(['name'=>$data['name']]);
    }

    public function update($party, $data)
    {
        if(isset($data['name'])) $party->name = $data['name'];
        $party->update();
    }
}