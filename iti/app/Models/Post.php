<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//    Add [title] to fillable property to allow mass assignment on [App\Models\Post].
    /*
     * when send associtive array of data to the function create, update
     * only keys specified in the $fillable will be passed to the object
     * */
        protected $fillable =['title','body', 'image'];
}
