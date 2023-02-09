<?php

namespace App\Services;

use App\Models\State;

class StateService
{

    public function getState($id)
    {
        return State::find($id);
    }

    public function getStates()
    {
        return State::all();
    }

    public function save($data)
    {
        $state = new state;
        $state->name = $data['name'];
        $state->save();
        return $state;
    }

    public function update($state, $data)
    {
        if(isset($data['name'])) $state->name = $data['name'];
        $state->update();
        return $state;
    }
}