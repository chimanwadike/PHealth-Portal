<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Facility;

class FacilityController extends Controller
{
	public function facilities(Request $request)
    {
    	return response()->json([
            'code' => '01',
            'facilities' => Facility::all(),
            'message' => 'Successful'
        ], 200);
    }
}
