<?php

namespace App\Services;

use App\Models\PresidentialResult;

class PresidentialResultService
{

    public function getResult($id)
    {
        return PresidentialResult::find($id);
    }

    public function getResultByParty($party_id)
    {
        return PresidentialResult::where('party_id', $party_id)->first();
    }

    public function getResults()
    {
        return PresidentialResult::all();
    }

    public function updateResult($results)
    {
        foreach($results as $party_id=>$votes) {
            $presidentialResult = $this->getResultByParty($party_id);
            if($presidentialResult) {
                $presidentialResult->votes = $votes;
                $presidentialResult->update();
            }
        }
    }
}