<?php

namespace App\Services;

use App\Models\Result;

use DB;

class ResultService
{

    public function getResult($id)
    {
        return Result::find($id);
    }

    public function getResultByState($state_id)
    {
        return Result::where('state_id', $state_id)->first();
    }

    public function getResults()
    {
        return Result::all();
    }

    public function save($data)
    {
        $new = false;
        $result = $this->getResultByState($data['state_id']);
        if(!$result) {
            $result = new Result;
            $new = true;
        }
        $result->state_id = $data['state_id'];
        if(isset($data['registered'])) $result->registered = $data['registered'];
        if(isset($data['accreditated'])) $result->accreditated = $data['accreditated'];
        if(isset($data['invalid'])) $result->invalid = $data['invalid'];
        if(isset($data['valid'])) $result->valid = $data['valid'];
        ($new) ? $result->save() : $result->update();
        return $result;
    }

    public function setWinner($result, $winner)
    {
        $result->party_id = $winner;
        $result->update();
        return $result;
    }

    public function removeWinner($result)
    {
        if($result->party_id != null) {
            $result->party_id = null;
            $result->update();
        }
        return $result;
    }

    public function totalValidVotes()
    {
        return Result::select(DB::raw("SUM(valid) as total_valid"))->get();
    }

    public function totalInValidVotes()
    {
        return Result::select(DB::raw("SUM(invalid) as total_invalid"))->get();
    }
}