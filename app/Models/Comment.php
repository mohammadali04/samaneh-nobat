<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['service_id','user_id','name','email','body','status'];
    public function score(){
        return $this->hasOne(Score::class);
    }
}