<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Favorite;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function days(){
        return $this->belongsToMany(Day::class,'service_id','id');
    }
    // public function services(){
    //     return $this->hasManyThrough(Service::class,Favorite::class,'user_id','id','service_id','id');
    // }
    public function role(){
        return $this->belongsToMany(Role::class,'user_role');
    }
    public function service(){
        return $this->hasOne(Service::class);
    }
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
    public function adminInfo(){
        return $this->hasOne(AdminInfo::class);
    }
}
