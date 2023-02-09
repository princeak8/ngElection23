<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\PartyResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\PresidentialResultResource;
use App\Http\Resources\StateResource;

use App\Services\PartyService;
use App\Services\ResultService;
use App\Services\PartyResultService;
use App\Services\PresidentialResultService;
use App\Services\StateService;

class CombinedController extends Controller
{
    private $partyService;
    private $resultService;
    private $partyResultService;
    private $presidentialResultService;
    private $stateService;

    public function __construct()
    {
        $this->partyService = new PartyService;
        $this->resultService = new ResultService;
        $this->partyResultService = new partyResultService;
        $this->presidentialResultService = new PresidentialResultService;
        $this->stateService = new StateService;
    }

    public function getCombinedData()
    {
        try{
            $parties = $this->partyService->getParties();
            $stateResults = $this->resultService->getResults();
            $results = $this->presidentialResultService->getResults();
            $states = $this->stateService->getStates();
            $totalValid = $this->resultService->totalValidVotes();
            $totalInValid = $this->resultService->totalInValidVotes();
            $totalPartyVotes = 0;
            if($results->count() > 0) {
                foreach($results as $result) {
                    $totalPartyVotes += $result->votes;
                }
            }
            // dd($totalValid->first()->total_valid.' - '.$totalPartyVotes);
            $others = $totalValid->first()->total_valid - $totalPartyVotes;
            $combinedData = [
                "parties" => PartyResource::collection($parties),
                "stateResults" => ResultResource::collection($stateResults),
                "totalResults" => PresidentialResultResource::collection($results),
                "states" => StateResource::collection($states),
                "total" => [
                            "valid" => $totalValid->first()->total_valid,
                            "invalid" => $totalInValid->first()->total_invalid,
                            "others" => $others
                ]
            ];
            return response()->json([
                'statusCode' => 200,
                'data' => $combinedData
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occured while trying to perform this operation, Please try again later or contact support'
            ], 500);
        }
    }

}
