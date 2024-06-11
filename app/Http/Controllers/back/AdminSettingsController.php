<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Settings;
use App\Models\Socialnetwork;


class AdminSettingsController extends Controller
{
    public function socials(){
        $socials=Socialnetwork::all();
        return view('back.social-networks.index',compact('socials'));
    }
    public function createSocial(){
        return view('back.social-networks.create');
    }
    public function storeSocial(Request $request){
        $dataValidation=$request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);
        try{
            Socialnetwork::create($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ثبت شد';
        return redirect(route('admin.social.index'))->with('success',$msg);
    }
    public function editSocial(Socialnetwork $socialnetwork){
        return view('back.social-networks.edit',compact('socialnetwork'));
    }
    public function updateSocial(Request $request,Socialnetwork $socialnetwork){
        $dataValidation=$request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);
        try{
            $socialnetwork->update($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ویرایش شد';
        return redirect(route('admin.social.index'))->with('success',$msg);
    }
    public function destroySocial(Request $request){
        Socialnetwork::destroy($request->ids);
        return redirect()->back();
    }
    public function banner(){
        $banner=Banner::find(1);
return view('back.banner.show',compact('banner'));
    }
    public function updateBanner(Request $request,Banner $banner){
        $dataValidation=$request->validate([
            'title'=>'required',
            'img'=>'required',
        ]);
        
        try{
            $banner->title=$request->title;
            $banner->img=$request->img;
            $banner->save();
        }
        catch(Exception $exception){
            dd($exception->getCode());
            return redirect()->back()->with('Warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ویرایش شد';
        return redirect()->route('admin.banner.show')->with('success',$msg);
    }
    public function address(){
        $settings=Settings::find(1);
return view('back.address.show',compact('settings'));
    }
    public function updateAddress(Request $request,Settings $settings){
        $dataValidation=$request->validate([
            'address'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
        try{
            $settings->address=$request->address;
            $settings->email=$request->email;
            $settings->phone=$request->phone;
            $settings->save();
        }
        catch(Exception $exception){
            dump($exception->getMessage());
            return redirect()->back()->with('success',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ویرایش شد';
        return redirect()->route('admin.settings.show')->with('success',$msg);
    }
}
