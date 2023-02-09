<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\PartyResource;

use App\Services\PartyService;

class PartyController extends Controller
{
    private $partyService;

    public function __construct()
    {
        $this->partyService = new PartyService;
    }

    public function parties()
    {
        try{
            $parties = $this->partyService->getParties();
            return response()->json([
                'statusCode' => 200,
                'data' => PartyResource::collection($parties)
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occured while trying to perform this operation, Please try again later or contact support'
            ], 500);
        }
    }
}
