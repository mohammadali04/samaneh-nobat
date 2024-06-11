<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Address;
use App\Models\Socialnetwork;

class AdminSocialController extends Controller
{
    public function socials(){
        return view('back.social-networks.index');
    }
    public function createSocial(){

    }
    public function storeSocial(){

    }
    public function editSocial(){

    }
    public function updateSocial(){

    }
    public function banner(){
return view('back.banner.show');
    }
    public function updateBanner(){

    }
    public function address(){
return view('back.address.show');
    }
    public function updateAdress(){

    }
}
