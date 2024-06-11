<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\AdminInfo;
use App\Models\ClientMessages;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class AdminIndexController extends Controller
{
    public function index(){
        $users=Role::find(4)->users()->get()->count();
        $services=Role::find(3)->users()->get()->count();
        $client_messages=ClientMessages::all()->count();
        return view('back.content',compact('users','services','client_messages'));
    }
    public function addInfo(){
        return view('admin-auth.add-info');
    }
    public function storeInfo(Request $request){
        $validation=$request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'img' => 'required'
        ]);
        try{
            AdminInfo::create(['user_id'=>auth()->user()->id,'name'=>$request->name,'img'=>$request->img,'address'=>$request->address,'phone'=>$request->phone]);
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getMessage());
        }
        $msg='اطلاعات مورد نظر با موفقیت ثبت شد';
        return redirect()->route('admin.index')->with('success',$msg);
    }
    public function editInfo(AdminInfo $admin_info){
        return view('admin-auth.edit-info',compact('admin_info'));
    }
    public function updateInfo(Request $request,AdminInfo $admin_info){
        $validation=$request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'img' => 'required'
        ]);
        try{
            $admin_info->update(['user_id'=>auth()->user()->id,'name'=>$request->name,'img'=>$request->img,'address'=>$request->address,'phone'=>$request->phone]);
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getMessage());
        }
        $msg='اطلاعات مورد نظر با موفقیت ویرایش شد';
        return redirect()->route('admin.index')->with('success',$msg);
    }

}
