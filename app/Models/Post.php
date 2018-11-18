<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
class Post extends Model
{

    protected $fillable = [
        'title','description','photo_id','user_id','photo_path',
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($table) {
            $table->photo_id = Post::base64image();
            $table->photo_path = public_path()."/img/post/";
            $table->user_id = Auth::user()->id;
        });
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);

    }


    public static function base64image()
    {
        $data = Input::all();
        $png_url = "photo" . time() . ".png";
        $path= public_path() . "/img/post/" . $png_url;
        $img = $data['photo_id'];
        $img = substr($img, strpos($img, ",") + 1);
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);
        return $success ? $png_url : 'Unable to save the file.';
    }


}
