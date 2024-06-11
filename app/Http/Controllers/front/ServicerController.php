<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\User;
use App\models\Category;
use App\Models\Gallerycategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Turn;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use App\Models\Time;
use Morilog\Jalali\Jalalian;


class ServicerController extends Controller
{
    public function addInfo(){
        $categories=Category::all();
        return view('front3.servicer-panel.add-info',compact('categories'));
    }
    public function storeInfo(Request $request){
    //    dd($request->all());
        $request->validate([
            'title' => 'required',
            'worker' => 'required',
            'category_id' => 'required',
            'detail' => 'required',
            'img' => 'required',
            'address'=> 'required',
            'phone'=> 'required',
        ]);
        $service=new Service();
        $address=new Address();
        try{
            $service= $service->create(['title'=>$request->title,'worker'=>$request->worker,'img'=>$request->img,'detail'=>$request->detail,'user_id'=>Auth::user()->id,'phone'=>$request->phone,'category_id'=>$request->category_id]);
            $service_id=$service->id;
            Auth::user()->role()->sync(['role_id'=>3]);
            $address->create(['service_id'=>$service_id,'address'=>$request->address]);
        }catch(Exception $e){
           return redirect()->back()->with('warning',$e->getMessage());
        }
               return redirect(Route('servicer.show.profile'));
    }
    public function showProfile(){
        $user=Auth::user();
       $service=$user->service()->first();
       $address=$service->address()->first();
       return view("front3.servicer-panel.profile",compact("service","address"));
    }
   
    public function editInfo(Service $service){
        $categories=Category::all();
        $address=$service->address()->first();
        $address=$address->address;
        return view('front3.servicer-panel.edit-info',compact('service','address','categories'));
    }
    public function updateInfo(Request $request,Service $service){
        $request->validate([
            'title' => 'required',
            'worker' => 'required',
            'category_id' => 'required',
            'detail' => 'required',
            'img' => 'required',
            'address'=> 'required',
            'phone'=> 'required',
        ]);
        try{
            $service->title=$request->title;
            $service->phone=$request->phone;
            $service->category_id=$request->category_id;
            $service->worker=$request->worker;
            $service->img=$request->img;
            $service->detail=$request->detail;
            $service->save();
            $service->address()->update(['service_id'=>$service->id,'address'=>$request->address]);
        }catch(Exception $e){
            return redirect()->back()->with('warning',$e->getMessage());
        }
       $msg='آیتم های مورد نظر با موفقیت ویرایش شد';
        return redirect(Route('servicer.show.profile'))->with('success',$msg);
    }
    public function createTurnTable(Service $service){
        return view('front3.servicer-panel.servicer-add-turn',compact('service'));
    }
    public function storeTable(Request $request){
        $user=Auth::user();
        $date=$request->date;
        $service_id=$user->service()->first()->id;
        $dateFormat=parent::exploadDateFormat($date);
        $day_id=parent::getDayId($dateFormat);
        $turn=new Turn();
       foreach($request->time as $row){
       $turn->create(['service_id'=>$service_id,'user_id'=>0,'day_id'=>$day_id,'time'=>$row,'active'=>0,'date'=>$date]);
}
DB::table('day_service')->insert(['service_id'=>$service_id,'day_id'=>$day_id]);//شاید این دستود اضفه باشد
return redirect()->back();

    }
    public function showDayHours(Turn $turn){
        $service=Auth::user()->service()->first();
        return view('front3.servicer-panel.servicer-show-hours',compact('turn','service'));
    }
    public function updateDayTime(Turn $turn,Request $request){
        $user=Auth::user();
        $service=$user->service()->first();
        $date=$request->date;
        $dateFormat=parent::exploadDateFormat($date);
        $day_id=parent::getDayId($dateFormat);
        try{
            $turn->time=$request->time;
            $turn->date=$request->date;
            $turn->day_id=$day_id;
            $turn->save();
        }
        catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم مورد نظر با موفقبت ویرایش شد';
        return redirect(Route('servicer.manage.turn',$service->id))->with('success',$msg);

       

    }
    public function manageSetTurns(Service $service){
        $turns=$service->turns()->get();
        return view('front3.servicer-panel.servicer-manage-turn',compact('turns','service'));
    }
    public function updateTurnTable(Turn $turn,Request $request){
        
    }
    public function reservedList(Service $service){
        $turns=DB::table('turns')->join('users' ,'turns.user_id' ,'=','users.id')
        ->where('service_id','=',$service->id)->where('active',1)->orderBy('turns.id','desc')->get(['time','date','name','email','user_id','turns.id']);
        return view('front3.servicer-panel.reserved-list',compact('turns','service'));
    }
    public function showReserveDetail(Turn $turn){
        $date=parent::getDateTimeJalali($turn->date);
        $user=User::where('id',$turn->user_id)->first();
        $service=Service::where('id',$turn->service_id)->first();
        return view('front3.servicer-panel.reserve-detail',compact('service','user','date','turn'));
    }
    // public function showGallery(){
    //     return view('front3.servicer-panel.gallery');
    // }
    public function addToGallery(Service $service){
        $gallery_categories=Gallerycategory::all();
        return view('front3.servicer-panel.add_to_gallery',compact('service','gallery_categories'));
    }
    public function storeGallery(Request $request, Service $service){
        // dd($request->all());
        $request->merge(['service_id'=>$service->id]);
           try{
            Gallery::create($request->all());
       }
       catch(Exception $e){
        dump($e->getMessage());
        return redirect()->back()->with('warning',$e->getMessage());

       }
       $msg='اطلاعات گالری با موفقیت ثبت شد';
       return redirect(Route('servicer.manage.gallery',$service->id))->with('success',$msg);
   
    }
    ////برای گرفتن نام دسته ها از متد جداگانه استفاده شود.
    public function editGallery(Gallery $gallery){
        $gallery_categories=Gallerycategory::all();
        $service=$gallery->service()->first();
        return view('front3.servicer-panel.edit_gallery',compact('service','gallery_categories','gallery'));
    }
public function updateGallery(Gallery $gallery,Request $request){
    /////شماره ی  سرویس در هر دو متد بررسی شود
    try{
        $gallery->update($request->all());
    }
    catch(Exception $e){
        return redirect()->back()->with('warning',$e->getCode());
    }
    $service=$gallery->service()->first();
    $msg='آیتم مورد نظر با موفقیت ویرایش شد';
    return redirect(Route('servicer.manage.gallery',$service->id))->with('success',$msg);
}
    public function manageGallery(Service $service){
        $galleries=$service->gallery()->get();
        return view('front3.servicer-panel.manage_gallery',compact('galleries','service'));
    }
    public function destroyGallery(Request $request){
        try{
            Gallery::destroy($request->ids);
        }catch(Exception $e){
            return redirect()->back()->with('warning',$e->getMessage());
        }
        $msg='آیتم های مورد نظر با موفقیت حذف شد';
        return redirect()->back()->with('success',$msg);
    }
    public function destroyTurns(Request $request){
        try{
            Turn::destroy($request->ids);

        }catch(Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='آیتم های مورد نظر با موفقیت حذف شد';
        return redirect()->back()->with('success',$msg);
    }
    
}
