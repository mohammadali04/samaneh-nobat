<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Service;
use App\Http\Resources\ServiceResource;

class SearchController extends BaseController
{
    public function index():JsonResponse{
        $services=Service::all();
        return $this->sendResponse(ServiceResource::collection($services),'services');
    }
    public function showServiceDetail($id){
        $service=Service::where('id',$id)->get();
        return $this->sendResponse(ServiceResource::collection($service),'service');
    }
}
