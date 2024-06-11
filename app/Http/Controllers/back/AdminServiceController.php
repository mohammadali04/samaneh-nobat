<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class AdminServiceController extends Controller
{
    public function index()
    {
        return view('back.admin-service.index');
    }
    public function changeStatus(Service $service)
    {
        if ($service->status == 0) {
            $service->status = 1;
        } else {
            $service->status = 0;
        }
        $service->save();
    }
    public function destroy(Request $request)
    {
        Service::destroy($request->ids);
        $msg = 'آیتم های مورد نظر با موفقیت جذف شدند';
        return redirect()->back()->with('successs', $msg);
    }
}