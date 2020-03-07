<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\State;

class StateController extends Controller
{
	public function states(Request $request)
    {
    	return response()->json([
            'code' => '01',
            'states' => State::all(),
            'message' => 'Successful'
        ], 200);
    }
}
