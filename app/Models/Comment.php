<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = [
    'text','user_id','post_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($table) {
            $table->user_id = Auth::user()->id;
        });
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

}
