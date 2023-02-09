<?php

namespace App\Services;

use App\Models\PartyResult;

use App\Services\PartyService;

class PartyResultService
{

    public function getResult($id)
    {
        return PartyResult::find($id);
    }

    public function getResults($result_id)
    {
        return PartyResult::where('result_id', $result_id)->get();
    }

    public function results()
    {
        return PartyResult::all();
    }

    public function save($results, $result_id)
    {
        foreach($results as $result) {
            $new = false;
            $partyService = new PartyService;
            $party_id = $partyService->getPartyByName($result['party'])->id;
            $partyResult = PartyResult::where('result_id', $result_id)->where('party_id', $party_id)->first();
            if(!$partyResult) {
                $partyResult = new PartyResult;
                $new = true;
            }
            $partyResult->result_id = $result_id;
            $partyResult->party_id = $party_id;
            $partyResult->votes = $result['votes'];
            ($new) ? $partyResult->save() : $partyResult->update();
            $partyResult = false;
            // return $partyResult;
        }
        return $this->results();
    }
}