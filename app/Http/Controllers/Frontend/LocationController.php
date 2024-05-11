<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;


class LocationController extends Controller
{
    public function getProvinces()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }

    public function getDistricts($provinceCode)
    {
        $province = Province::where('code', $provinceCode)->firstOrFail();
        $districts = $province->districts;

        return response()->json($districts);
    }

    public function getWards($districtCode)
    {
        $district = District::where('code', $districtCode)->firstOrFail();
        $wards = $district->ward;

        return response()->json($wards);
    }
}
