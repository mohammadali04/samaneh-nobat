<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\About;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Service;
use App\models\Option;
Use App\Models\Turn;
use App\Models\Score;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\TrueType;
use App\Models\ClientMessages;

class IndexController extends Controller
{
    public function index(){
        $best_services=$this->getBestServices();
        $categories=Category::all();
        $about=About::find(1);
        $services=Service::all();
        $options=Option::all();
        $index='index';
        $faqs=Faq::all();
        // $content= 'yes';
        return view('front3.index',compact('categories','about','options','best_services','index','faqs'));
    }
    public function showCategory($id){
        $services=Service::where('category_id',$id)->paginate(4);
        if(count($services)!=0){
            return view('front3.search.search',compact('services'));
        }else{
            $msg='موردی یافت نشد';
            return redirect(Route('search.index'))->with('warning',$msg); 
        }
    }
    public function showReservedList(){
        $user=Auth::user();
        $user_name=$user->name;
        $user_id=$user->id;
        $turns=Turn::where('user_id',$user_id)->where('active',1)->get();
        foreach($turns as $turn){
            $turn['service']=Service::where('id',$turn->service_id)->get();
        }
        return view('front3.user-panel.reserved-list',compact('turns','user_name'));
    }
    public function showFavoriteList(){
       $services=[];
       $user=Auth::user();
       $user_email=$user->email;
        $favorites=$user->favorites()->get();
        foreach($favorites as $favorite){
            $service=Service::where('id',$favorite->service_id)->first();
            array_push($services,$service);
        }
        return view('front3.user-panel.favorite-list',compact('services','user_email'));///مشکل آدرس دارد
    }
    public function addClientMessage(Request $request){
        $valiedation=$request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'subject'=>'required',
                'message'=>'required',
            ]
        );
        $clientMessage=new ClientMessages();
        Try{
            $clientMessage->create($request->all());
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        $msg='پیغام شما ارسال شد با تشکر فراوان';
        return redirect()->back()->with('success',$msg);
    }
    function getBestServices(){
        $best_services=[];
        $scores=$this->getServiceScore();
        arsort($scores);
        foreach($scores as $key=>$score){
            $service=Service::where('id',$key)->first();
            array_push($best_services,$service);
        }
        return $best_services;
    }
    function getServiceScore(){
        $scores=[];
        $services=Service::all();
        foreach($services as $service){
            $score=$this->calculateServiceScore($service->id);
            if($score!=null){
                $scores[$service->id]=$score;
            }        
        }
        return $scores;
    }
    function calculateServiceScore($service_id){
        $score=Score::where('service_id',$service_id)->pluck('score')->avg();
        return $score;
    }
    
    // public function turnsTable(){
        //     return view('front3.panel.turns-table');
        // }
        
    }
    