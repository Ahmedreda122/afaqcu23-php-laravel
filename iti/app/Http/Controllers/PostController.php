<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ## request 00> object
         $request->validate([
             "title"=>'required|unique:posts'
         ]);

//         dd($request);
//         ## store post info
//        dd($request->all());

//        dd($request->image);
//        dd($request->image);
        $post =Post::create(['title'=>$request->title,'body'=> $request->body, "image"=>$request->image]);
        $this->save_image($request->image, $post);
        return to_route('posts.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)  # resource controller ---> ask the model to get the object with
        # with the specified id
    {
        //

//        dd($post);

        return view('posts.show', ['post'=>$post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', ["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
//            "title"=>'required|unique:posts,title'
            "title"=>['required',Rule::unique('posts')->ignore($post)]
        ]);
        $old_image = $post->image;
        $post->update($request->all());
//        dd($request->all());
        $this->save_image($request->image, $post);
        if($request->image){
            $this->delete_old_image($old_image);
        }
        return to_route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $this->delete_old_image($post->image);
        $post->delete();
        return to_route('posts.index');
    }

    private  function  save_image($image, $post){
        if($image){
            $image_name = time().'.'.$image->extension();
            # move image from tmp folder to the public path
            $image->move(public_path('images/posts/images/'), $image_name);
            $post->image = $image_name;
            $post->save();
        }
    }

    # what will happen when update image ?
    private  function  delete_old_image($image_name){
        try{
            unlink('images/posts/images/'.$image_name);
        }catch (\Exception $e){
            echo $e;
        }
    }
}
