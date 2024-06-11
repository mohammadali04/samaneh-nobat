<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;
    protected $fillable=['service_id','user_id','day_id','time','active','date'];
    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
