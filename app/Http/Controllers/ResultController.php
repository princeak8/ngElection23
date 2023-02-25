<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SaveResult;

use App\Http\Resources\ResultResource;

use App\Services\ResultService;
use App\Services\PartyResultService;
use App\Services\PresidentialResultService;

use App\Helpers;

class ResultController extends Controller
{
    private $resultService;
    private $partyResultService;
    private $presidentialResultService;

    public function __construct()
    {
        $this->resultService = new ResultService;
        $this->partyResultService = new partyResultService;
        $this->presidentialResultService = new PresidentialResultService;
    }
    public function save(SaveResult $request)
    {
        try{
            $data = $request->all();
            $result = $this->resultService->save($data);
            $statesPartyResults = null;
            if(isset($data['results'])) {
                $statesPartyResults = $this->partyResultService->save($data['results'], $result->id);
                $winner = Helpers::getWinner($result->id);
                $result = ($winner) ? $this->resultService->setWinner($result, $winner) : $this->resultService->removeWinner($result);
            }
            if($statesPartyResults != null) {
                $totalPartyVotes = Helpers::calculateTotalPartyVotes($statesPartyResults);
                $this->presidentialResultService->updateResult($totalPartyVotes);
            }
            return response()->json([
                'statusCode' => 200,
                'data' => new ResultResource($result)
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occured while trying to perform this operation, Please try again later or contact support '.$e->getMessage().' in '.$e->getFile().' at Line '.$e->getLine()
            ], 500);
        }
    }
}

