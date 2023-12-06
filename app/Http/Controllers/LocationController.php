<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


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


    public function index()
    {
      
    $provinces = json_decode(file_get_contents(public_path('json/provinces.json')), true);
    

       
    
        return view('Dashboard.Location.location', ['provinces' => $provinces]);
    }


    public function edit($id)
{
    $filePath = public_path('json/provinces.json');
    
    if (file_exists($filePath)) {
        $jsonContents = file_get_contents($filePath);
        $provinces = json_decode($jsonContents, true);

        if ($provinces === null) {
            return response()->json(['error' => 'Failed to parse JSON'], 500);
        }
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }

    foreach ($provinces as $item) {
        // Check if 'id' key is present in the current item
        if (isset($item['Id'])) {
            $itemId = $item['Id'];
            
            // Do something with $itemId, for example, check if it matches the provided $id
            if ($itemId == $id) {
                // Perform actions for the matching item
                // For example, return a JSON response with the matching item details
                return view('Dashboard.Location.Editlocation', ['item' => $item]);
            }
        }
    }

    // If no matching item is found or if 'id' is missing, handle that case accordingly
    return response()->json(['error' => 'Item not found'], 404);
}




public function store(Request $request)
{
    $filePath = public_path('json/provinces.json');

    if (file_exists($filePath)) {
        $jsonContents = file_get_contents($filePath);
        $provinces = json_decode($jsonContents, true);

        if ($provinces === null) {
            return response()->json(['error' => 'Failed to parse JSON'], 500);
        }
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }

    $provinceUpdated = false;

    foreach ($provinces as &$province) {
        if (isset($province['Id']) && $province['Id'] == $request->id) {
            // Cập nhật thông tin tỉnh/thành phố dựa trên dữ liệu gửi từ biểu mẫu
            $province['Name'] = $request->input('name');
            $province['SortOrder'] = $request->input('sortOrder');
            // Thêm các trường khác nếu cần

            $provinceUpdated = true;
            break;
        }
    }
    if ($provinceUpdated) {
        // Lưu mảng tỉnh/thành phố đã cập nhật trở lại vào tệp
        file_put_contents($filePath, json_encode($provinces, JSON_PRETTY_PRINT));

        // Tải lại dữ liệu đã cập nhật từ tệp
        $jsonContents = file_get_contents($filePath);
        $provinces = json_decode($jsonContents, true);

        // Chuyển hướng về trang hiển thị danh sách các tỉnh/thành phố với dữ liệu đã cập nhật
        return view('Dashboard.Location.location', ['provinces' => $provinces])->with('success', 'Cập nhật tỉnh/thành phố thành công');
    }

    
}



public function add(){

    return view('Dashboard.Location.Addlocation');


}



public function save(Request $request)
{
    $filePath = public_path('json/provinces.json');

    if (file_exists($filePath)) {
        $jsonContents = file_get_contents($filePath);
        $provinces = json_decode($jsonContents, true);

        if ($provinces === null) {
            return response()->json(['error' => 'Failed to parse JSON'], 500);
        }
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }

    foreach ($provinces as $item) {
        // Check if 'id' key is present in the current item
        if (isset($item['Name'])) {
            if($item['Name'] == $request->input('name')){

                return view('Dashboard.Location.location', ['provinces' => $provinces])->with('success', 'Đã Tồn Tại');
            }
        }
    }

    $newProvince = [
        'Id' => $request->input('id'),
        'Kind' => $request->input('kind'),
        'Name' => $request->input('name'),
        'SortOrder' => $request->input('sortOrder') , 
      
    ];
    // Thêm tỉnh/thành phố mới vào mảng tỉnh/thành phố hiện tại
    $provinces[] = $newProvince;
    // Lưu mảng tỉnh/thành phố đã cập nhật trở lại vào tệp
    file_put_contents($filePath, json_encode($provinces, JSON_PRETTY_PRINT));

    // Tải lại dữ liệu đã cập nhật từ tệp
    $jsonContents = file_get_contents($filePath);
    $provinces = json_decode($jsonContents, true);
   
    return view('Dashboard.Location.location', ['provinces' => $provinces])->with('success', 'Cập nhật tỉnh/thành phố thành công');
}



public function delete($id)
{
    $filePath = public_path('json/provinces.json');

    if (file_exists($filePath)) {
        $jsonContents = file_get_contents($filePath);
        $provinces = json_decode($jsonContents, true);

        if ($provinces === null) {
            return response()->json(['error' => 'Failed to parse JSON'], 500);
        }
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }

    // Tìm tỉnh/thành phố cần xóa
    $indexToDelete = null;
    foreach ($provinces as $index => $province) {
        if (isset($province['Id']) && $province['Id'] == $id) {
            $indexToDelete = $index;
            break;
        }
    }

    if ($indexToDelete !== null) {
        // Xóa tỉnh/thành phố khỏi mảng
        array_splice($provinces, $indexToDelete, 1);

        // Lưu mảng tỉnh/thành phố đã cập nhật trở lại vào tệp
        file_put_contents($filePath, json_encode($provinces, JSON_PRETTY_PRINT));

        // Tải lại dữ liệu đã cập nhật từ tệp
        $jsonContents = file_get_contents($filePath);
        $provinces = json_decode($jsonContents, true);

        // Chuyển hướng về trang hiển thị danh sách các tỉnh/thành phố với dữ liệu đã cập nhật
        return view('Dashboard.Location.location', ['provinces' => $provinces])
            ->with('success', 'Xóa tỉnh/thành phố thành công');
    }

    // Nếu không tìm thấy tỉnh/thành phố cần xóa
    return response()->json(['error' => 'Province not found'], 404);
}

   
 
}

    
    
    
   
    



   
  

