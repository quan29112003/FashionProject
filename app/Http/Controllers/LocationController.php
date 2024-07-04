<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function getDistricts($provinceId)
    {
        $districts = DB::table('districts')->where('province_code', (int)$provinceId)->get();
        // dd($districts);
        return response()->json($districts);
    }

    public function getWards($districtId)
    {
        $wards = Ward::where('district_code',  (int)$districtId)->get();
        // dd($wards);
        return response()->json($wards);
    }
}
