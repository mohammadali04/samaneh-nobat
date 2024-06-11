<?php

namespace App\Models;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Favorite;


class Service extends Model
{
    use HasFactory;
    protected $fillable=['title','worker','img','detail','phone','user_id','category_id','status'];
    public function days(){
        return $this->hasMany(Day::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }
    // public function turns(){
    //     return $this->hasMany(Turn::class,'service_id','id');
    // }فعلا نیازی به این نداریم
    public function user(){
        return $this->belongsTo(User::class,'favorites','service_id');
    }
    public function gallery(){
        return $this->hasMany(Gallery::class);
    }
    public function categories(){
        return $this->hasMany(Gallery::class,'category_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function category(){
        return $this->belongsTo(Category::class,'id','category_id');
    }
    public function turns(){
        return $this->hasMany(Turn::class);
    }
    public function mainUser(){
        return $this->belongsTo(User::class);
    }
  
}
