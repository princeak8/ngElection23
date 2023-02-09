<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveResult;

use App\Http\Resources\ResultResource;
use App\Http\Resources\PresidentialResultResource;

use App\Services\ResultService;
use App\Services\PartyResultService;
use App\Services\PresidentialResultService;

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
    public function results()
    {
        try{
            $results = $this->resultService->getResults();
            return response()->json([
                'statusCode' => 200,
                'data' => ResultResource::collection($results)
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occured while trying to perform this operation, Please try again later or contact support'
            ], 500);
        }
    }

    public function presidential()
    {
        try{
            $results = $this->presidentialResultService->getResults();
            return response()->json([
                'statusCode' => 200,
                'data' => PresidentialResultResource::collection($results)
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occured while trying to perform this operation, Please try again later or contact support'
            ], 500);
        }
    }

    public function total()
    {
        try{
            $totalValid = $this->resultService->totalValidVotes();
            $totalInValid = $this->resultService->totalInValidVotes();
            return response()->json([
                'statusCode' => 200,
                'data' => [
                    "valid" => $totalValid->first()->total_valid,
                    "invalid" => $totalInValid->first()->total_invalid
                ]
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occured while trying to perform this operation, Please try again later or contact support'
            ], 500);
        }
    }
}
