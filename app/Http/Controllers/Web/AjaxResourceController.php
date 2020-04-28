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

    public function getFacilities(Request $request){
        $arrData = array();

        if($request->lga == null || $request->lga == ""){
            return response()->json($arrData);
        }

        $facilities = DB::table('facilities')
            ->where('facilities.lga_code', '=', $request->lga)
            ->orderBy('facilities.name', 'asc')
            ->get();

        foreach($facilities as $facility){
            $arrData[$facility->id] = $facility->name;
        }

        return response()->json($arrData);
    }

    public function getSpokes(Request $request){
        $arrData = array();

        if($request->facility_id == null || $request->facility_id == ""){
            return response()->json($arrData);
        }

        $spokes = DB::table('spokes')
            ->where('spokes.facility_id', '=', $request->facility_id)
            ->orderBy('spokes.name', 'asc')
            ->get();

        foreach($spokes as $spoke){
            $arrData[$spoke->id] = $spoke->name;
        }

        return response()->json($arrData);
    }
}
