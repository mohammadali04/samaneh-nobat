<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable=['category_id','service_id','title','detail','img'];
    public function category(){
        return $this->belongsTo(GalleryCategory::class,'category_id','id');
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
