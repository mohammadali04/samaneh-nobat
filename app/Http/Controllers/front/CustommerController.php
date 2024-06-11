<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustommerController extends Controller
{
    public function showMyTurn(){
    return view('front.turn.my-turn');
//not diterminate yet;
    }
    public function getMyFavoritServices($service_ids){
        $services=[];
        foreach($service_ids as $service_id){
            $service=Service::where('id',$service_id)->first();
            array_push($services,$service);
        }
        return $services;
    }
    public function showMyFavorits(){
        // $userId=Auth::user()->id;
        $myFavorites=Auth::user()->favorites()->get();
        // $favoritIds=Favorite::where('user_id',$userId)->pluck('service_id');
        // $myFavorits=$this->getMyFavoritServices($favoritIds);
        return view('front3.custommer-panel.show-my-favorits',compact('myFavorites'));
    }
    public function discardFavorite($service){
        Favorite::where('service_id',$service)->delete();      
        return redirect()->back();  
    }
    public function pay(){
//not diterminate yet
    }
    public function showMyPays(){
        return view('front.user-panel.show-my-pays');
    }
    
}