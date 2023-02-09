<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\StateResource;

use App\Services\StateService;

class StateController extends Controller
{
    private $stateService;

    public function __construct()
    {
        $this->stateService = new StateService;
    }

    public function all()
    {
        try{
            $states = $this->stateService->getStates();
            return response()->json([
                'statusCode' => 200,
                'data' => StateResource::collection($states)
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occured while trying to perform this operation, Please try again later or contact support'
            ], 500);
        }
    }
}
