<?php

namespace App;

use App\Models\PartyResult;

class Helpers
{

    public static function calculateTotalPartyVotes($statesResults)
    {
        $result = [];
        foreach($statesResults as $stateResult) {
            if(!isset($result[$stateResult->party_id])) $result[$stateResult->party_id] = 0;
            $result[$stateResult->party_id] += $stateResult->votes;
        }
        return $result;
    }

    public static function getStatesWith25Percent($party_id)
    {
        $count = 0;
        $partyResults = PartyResult::where('party_id', $party_id)->get();
        foreach($partyResults as $partyResult) {
            // Get the percentage of votes that a party got by dividing its votes with the valid votes and multiplying by 100
            $percentage = ($partyResult->result->valid > 0 && $partyResult->result->valid > $partyResult->votes) ? ($partyResult->votes/$partyResult->result->valid) * 100 : 0;
            if($percentage >= 25) $count++;
        }
        return $count;
    }

    public static function getWinner($result_id)
    {
        $stateResults = PartyResult::where('result_id', $result_id)->get();
        if($stateResults->count() > 0 && $stateResults->count() >= 3) {
            $highest = 0;
            $winner = 0;
            foreach($stateResults as $stateResult) {
                if($stateResult->votes > $highest) {
                    $highest = $stateResult->votes;
                    $winner = $stateResult->party_id;
                }
            }
            return $winner;
        }
        return false;
    }

}