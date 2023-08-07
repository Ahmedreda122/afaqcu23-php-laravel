<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;


class Student extends Model
{
    use HasFactory;
    # return array contains posts written by this user
    function post(){
        return $this->hasMany(Post::class);
    }
}
