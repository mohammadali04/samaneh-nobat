<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Option;
use Exception;
use Illuminate\Http\Request;

class BioManagerController extends Controller
{
    public function index()
    {
       
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('back.bio-manager.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,About $about)
    {
        $validationData=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'img'=>'required',
        ]);
        try{
            $about->update($request->all());
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='دسته ی مورد نظر با موفقیت ویرایش شد';
        return redirect()->back()->with('success',$msg);
    }
    public function showOptions(){
        $options=Option::all();
        return view('back.options.index',compact('options'));
    }
    public function addOptions(){
       return view('back.options.create');
    }
    public function storeOptions(Request $request){
        $validationData=$request->validate([
            'option'=>'required',
        ]);
        $optionobj=new Option();
        try{
            foreach($request->option as $option){
            $optionobj->create(['option'=>$option]);
            }
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ثبت شد';
        return redirect(Route('admin.show.option'))->with('success',$msg);
    }
    public function editOptions(Option $option){
        return view('back.options.edit',compact('option'));
    }
    public function updateOptions(Request $request,Option $option){
        // dd($request->all());
        $validationData=$request->validate([
            'option'=>'required',
        ]);
        try{
            $option->option=$request->option;
            $option->save();    
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت ویرایش شد';
        return redirect(Route('admin.show.option'))->with('success',$msg);
    }
    public function destroyOptions(Request $request){
        try{
            Option::destroy($request->ids);         
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت حذف شد';
        return redirect(Route('admin.show.option'))->with('success',$msg);
    }

   
}
