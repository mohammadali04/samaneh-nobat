<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Turn;
use App\Models\Role;

class AdminUserController extends Controller
{
    public function index(){
        $users=Role::find(4)->users()->get();
        return view('back.user.index',compact('users'));
    }
    public function destroy(Request $request){
        User::destroy($request->ids);
        foreach($request->ids as $id){
            Turn::where('user_id',$id)->delete();
            Favorite::where('user_id',$id)->delete();
        }
        $msg='آیتم های مورد نظر با موفقیت حذف شدند';
        return redirect()->back()->with('success',$msg);
    }
}
