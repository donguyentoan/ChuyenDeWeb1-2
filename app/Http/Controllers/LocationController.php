<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{

    
    public function getProvinces()
    {
        $filePath = public_path('json/provinces.json');
        $provinces = [];

        if (File::exists($filePath)) {
            $jsonContents = File::get($filePath);
            $provinces = json_decode($jsonContents, true);

            if ($provinces === null) {
                return response()->json(['error' => 'Failed to parse JSON'], 500);
            }
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }

        return response()->json(['provinces' => $provinces], 200);
    }

    public function getDistrictsByProvince($provinceId)
    {
        $filePath = public_path('json/districts.json');
        $matchingDistricts = [];

        if (File::exists($filePath)) {
            $jsonContents = File::get($filePath);
            $districts = json_decode($jsonContents, true);

            foreach ($districts as $district) {
                if ($district['parentId'] === $provinceId) {
                    $matchingDistricts[] = $district;
                }
            }
        }

        return response()->json(['districts' => $matchingDistricts], 200);
    }

    public function getWardsByDistrict($districtId)
    {
        $filePath = public_path('json/wards.json');
        $matchingWards = [];

        if (File::exists($filePath)) {
            $jsonContents = File::get($filePath);
            $wards = json_decode($jsonContents, true);

            foreach ($wards as $ward) {
                if ($ward['parentId'] === $districtId) {
                    $matchingWards[] = $ward;
                }
            }
        }

        return response()->json(['wards' => $matchingWards], 200);
    }


   
  
}
