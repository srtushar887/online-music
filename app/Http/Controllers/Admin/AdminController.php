<?php

namespace App\Http\Controllers\Admin;

use App\general_setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.page.generalSettings',compact('gen'));
    }

    public function general_settings_save(Request $request)
    {
        $gen_update = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen_update->logo);
            $image = $request->file('logo');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('logo');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen_update->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen_update->icon);
            $image = $request->file('icon');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('icon');
            $directory = 'assets/admin/images/logo/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $gen_update->icon = $imgUrl1;
        }

        $gen_update->site_name = $request->site_name;
        $gen_update->site_email = $request->site_email;
        $gen_update->site_phone = $request->site_phone;
        $gen_update->site_address = $request->site_address;
        $gen_update->save();
        return back()->with('success','General Setting Successfully Updated');


    }

}
