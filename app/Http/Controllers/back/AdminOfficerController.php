<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DB;

class AdminOfficerController extends Controller
{
    public function index(){
        $roles=Role::find([1,2]);
                $officers=[];
        foreach($roles as $key => $role){
            $officer=$role->users()->get();
            foreach($officer as $row){
                array_push($officers,$row);
            }
        }
        return view('back.admins.index',compact('officers'));
    }
    public function changeStatus(User $user){
        if($user->status==0){
            $user->status=1;
        }else{
            $user->status=0;
        }
        $user->save();
        return redirect()->back();
    }
    public function changeLevel1(Request $request){
        foreach($request->ids as $id){
            DB::table('user_role')->where('user_id',$id)->update(['role_id'=>1]);
        }
        return redirect()->back();
    }
    public function changeLevel2(Request $request){
        foreach($request->ids as $id){
            DB::table('user_role')->where('user_id',$id)->update(['role_id'=>2]);
        }
        return redirect()->back();
    }
    public function showInfo(User $user){
        return view('back.admin-offier.show-info');
    }
    public function destroy(Request $request){
        User::destroy($request->ids);
        foreach($request->ids as $id){
            DB::table('user_role')->where('user_id',$id)->delete();
        }
        $msg='آیتم های مورد نظر با موفقیت حذف شدند';       
         return redirect()->back()->with('success',$msg);
    }
}
