<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;


class Student extends Model
{
    use HasFactory;
    # return array contains posts written by this user
    protected $fillable = ['name','email', 'grade', 'image', 'user_id'];
    function post(){
        return $this->hasMany(Post::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
