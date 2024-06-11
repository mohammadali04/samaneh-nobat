<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\Rules\Exists;
use Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this_user_is_true=0;
        $service_parameter=Route::current()->parameter('service');
        $turn_parameter=Route::current()->parameter('turn');
        $admin_info_parameter=Route::current()->parameter('admin_info');
        $gallery_parameter=Route::current()->parameter('gallery');
        $service_id=auth()->user()->service()->first()->id;
        if(isset($service_parameter)){
            $parameter=$service_parameter;

            if($this->compaireId($service_id,$parameter->id)==true){
                $this_user_is_true=1;
            }
        }
        if(isset($turn_parameter)){
            $parameter=$turn_parameter->service()->first();
            if($this->compaireId($service_id,$parameter->id==true)){
                $this_user_is_true=1;
            }
        }
        if(isset($admin_info_parameter)){
            $parameter=$admin_info_parameter->user_id;
            if($this->compaireId(auth()->user()->id,$parameter)==true){
                $this_user_is_true=1;
            }
        }
        if(isset($gallery_parameter)){
            $gallery_service_id=$gallery_parameter->service()->first()->id;
            if($this->compaireId($service_id,$gallery_service_id)==true){
                $this_user_is_true=1;
            }
        }
        if($this_user_is_true==1){
            return $next($request);
        }
        else{
            $msg='دسترسی به این لینک برای شما مقدور نیست';
            return redirect(Route('index'))->with('warning',$msg);
        }
        
    }
    public function compaireId($first_id,$second_id){
        if($first_id==$second_id){
            return true;
        }else{
            return false;
        }
    }
}
