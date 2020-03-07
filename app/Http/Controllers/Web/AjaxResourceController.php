<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AjaxResourceController extends Controller
{
	public function getLga(Request $request)
    {
        $arrData = array();
    
        if($request->state == null || $request->state == ""){
            return response()->json($arrData);
        }

        $lgas = DB::table('lgas')
            ->where('lgas.state_code', '=', $request->state)
            ->orderBy('lgas.lga_name', 'asc')
            ->get();

        foreach($lgas as $lga){
            $arrData[$lga->lga_code] = $lga->lga_name;
        }

        return response()->json($arrData);
    }
}
