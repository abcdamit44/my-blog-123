<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return view('backend.post.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //public function create()
        $cats = Category::all();
        return view('backend.post.add',['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required'
        ]);

        // Thumbnail image
        if ($request->hasFile('post_thumb')) {
            $image = $request->file('post_thumb');
            $newThumbimage = time(). rand(1,1000) . ".". $image->getClientOriginalExtension();
            $image->move(public_path('/images'), $newThumbimage);
        }else{
            $newThumbimage = "N/A";
        }

        // Full image
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $newFullimage = time(). rand(1,1000) . ".". $image->getClientOriginalExtension();
            $image->move(public_path('/images'), $newFullimage);
        }else{
            $newThumbimage = "N/A";
        }

        $post = new Post;

        $post->user_id = 0;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $newThumbimage;
        $post->full_img = $newFullimage;
        $post->detail = $request->detail;
        $post->tags = $request->tags;
        $post->save();

        return redirect('admin/post/create')->with('success', "Data has been added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::all();
        $data = Post::find($id);
        return view('backend.post.update',[
            'data' => $data,
            'cats' => $cats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required'
        ]);

        // Thumbnail image
        if ($request->hasFile('post_thumb')) {
            $image = $request->file('post_thumb');
            $newThumbimage = time(). rand(1,1000) . ".". $image->getClientOriginalExtension();
            $image->move(public_path('/images'), $newThumbimage);
        }else{
            $newThumbimage = $request->post_thumb;
        }

        // Full image
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $newFullimage = time(). rand(1,1000) . ".". $image->getClientOriginalExtension();
            $image->move(public_path('/images'), $newFullimage);
        }else{
            $newFullimage = $request->post_image;
        }

        $post = Post::find($id);
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $newThumbimage;
        $post->full_img = $newFullimage;
        $post->detail = $request->detail;
        $post->tags = $request->tags;
        $post->save();

        return redirect('admin/post/'.$id.'/edit')->with('success', "Data has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect('admin/post');
    }
}
