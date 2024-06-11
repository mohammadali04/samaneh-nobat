<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ['id'=>$this->id,
    'user_id'=>$this->user_id,
    'category_id'=>$this->category_id,
    'title'=>$this->worker,
    'img'=>$this->img,
    'detail'=>$this->detail,
    'phone'=>$this->phone,
    'created_at'=>$this->created_at,
    'updated_at'=>$this->updated_at,
    ];
    }
}
