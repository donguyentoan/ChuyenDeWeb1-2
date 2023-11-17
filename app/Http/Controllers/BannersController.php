<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banners::latest('updated_at')->paginate(5);

        return view('Dashboard..Banners.BannersList' , compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
        ]);
    
        $fileName = null; // Đặt giá trị mặc định cho biến $fileName
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Xử lý tệp ở đây
            $file = $request->file('image');
            $fileName = time(). $file->getClientOriginalName();
            $path = 'upload';
            $file->move($path, $fileName);
        }

        $banner = new Banners();
        $banner->name_banner = $fileName;
        $banner->save();
    
        return redirect('/bannerList')->with('success', 'Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banners::find($id);
        $banners = Banners::latest('updated_at')->paginate(5);

        return view('Dashboard..Banners.EditBannersList' , ['banner' => $banner , "banners" => $banners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banners::find($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old photo if it exists
            $oldPhoto = $banner->name_banner;
            if ($oldPhoto != null && file_exists('upload/' . $oldPhoto)) {
                $deleted = unlink('upload/' . $oldPhoto);
                
                // Check if the delete was successful
                if ($deleted) {
                    // Upload the new image
                    $file = $request->file('image');
                    $fileName = time() . $file->getClientOriginalName();
                    $path = 'upload';
                    $file->move($path, $fileName);
                    $banner->name_banner = $fileName;
                }
            } else {
                // If there's no old photo or it doesn't exist, just upload the new image
                $file = $request->file('image');
                $fileName = time() . $file->getClientOriginalName();
                $path = 'upload';
                $file->move($path, $fileName);
                $banner->name_banner = $fileName;
            }
        }

        $banner->save();

        return redirect('/bannerList')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banners::find($id);

        // Xóa tệp hình ảnh nếu tồn tại
        $oldPhoto = $banner->name_banner;
        if ($oldPhoto != null && file_exists('upload/' . $oldPhoto)) {
            unlink('upload/' . $oldPhoto);
        }

        $banner->delete();

        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect('/bannerList')->with('success', 'Delete successfully');
    }
}