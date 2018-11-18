<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname' ,'email', 'password','api_token','role_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function posts(){
        return $this->hasMany(Post::class,'user_id');

    }

    public function inRole($role)
    {
        return $this->role()->first()->name == $role;
    }

    public function comments(){
        return $this->hasMany(Comment::class);

    }
    public static function generateToken()
    {
        $token = str_random(60);
        if (User::where('api_token', $token)->first()) {
            return self::generateToken();
        }
        return $token;
    }

}
