<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\State;
use App\Model\Lga;

class LgaController extends Controller
{
	public function lgas(Request $request)
    {
    	return response()->json([
            'code' => '01',
            'lgas' => Lga::all(),
            'message' => 'Successful'
        ], 200);
    }

    public function states_lga(Request $request, $state)
    {
    	$state = State::where('state_code', $state)->get()->first();

    	if($state){
    		return response()->json([
	            'code' => '01',
	            'state' => $state,
	            'lgas' => $state->lgas,
	            'message' => 'Successful'
	        ], 200);
    	}else{
    		return response()->json([
	            'code' => '02',
	            'message' => 'State could not be found'
	        ], 401);
    	}
    }
}
