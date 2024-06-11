<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(){
        $questions = Faq::all();
        return view("back.faq.index",compact("questions"));
    }
    public function create(){   
        return view("back.faq.create");
    }
    public function store(Request $request){ 
        // unset($request["_token"]);

        // dd($request->all());
        $validationData = $request->validate([
            "question"=> "required",
            "answer"=> "required",
        ]);
        try{
            Faq::create($request->all());  
        }catch(\Exception $exception){
            return back()->with('warning',$exception->getCode());
        }
        $msg = 'آیتم های مورد نظر با موفقیت ثبت شد';
        return redirect(Route('admin.faq.index'))->with('success',$msg);
        
    }
    public function edit(Faq $faq){
        return view("back.faq.edit",compact("faq"));
    }
    public function update(Request $request, Faq $faq){
        $validationData = $request->validate([
            "question"=> "required",
            "answer"=> "required",
        ]);
        try{
            $faq->update($request->all());
        }catch(\Exception $exception){
            return redirect()->back()->with("warning",$exception->getCode());
        }
        $msg="آیتم مورد نظر با موفقیت ویرایش شد";
        return redirect (Route("admin.faq.index"))->with("success",$msg);
    }
    public function destroy(Request $request){
        try{
            Faq::destroy($request->ids);
        }catch(\Exception $exception){
            return redirect()->back()->with("warning",$exception->getCode());
        }
        $msg = "آیتم های مورد نظر با موفقیت حذف شد";
        return redirect(Route("admin.faq.index"))->with("success",$msg);
    }
}
