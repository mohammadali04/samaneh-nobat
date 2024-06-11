<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends BaseController
{
    public function Register(Request $request):JsonResponse{
        $dataValidator=Validator::make($request->all(),[
            'name' => 'required|unique',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($dataValidator->fails()){
            return $this->sendError('Validation Error',$dataValidator->errors());
        }
        $input=$request->all();
        $input['password']=bcrypt($input['password']);
     $user = User::create($input);
        $success['token']=$user->createToken('MyApp')->plainTextToken;
        $success['name']=$user->name;
        return $this->sendResponse($success,'Registeration is successfully');
    }
    public function login(Request $request){
        $dataValidator=Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($dataValidator->fails()){
            return $this->sendError('Validation Error',$dataValidator->errors());
        }
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            $user=Auth::user();
            $success['token']=$user->createToken('MyApp')->plainTextToken;
            $success['name']=$user->name;
            return $this->sendResponse($success,'Login is Successfully');
        }
    }
}
