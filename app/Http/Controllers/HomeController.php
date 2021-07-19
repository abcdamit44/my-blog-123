<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('q')){
            $q = $request->q;
            $posts = Post::where('title','like','%'.$q .'%')->orderBy('id','desc')->paginate(10);
        }
        else{
            $posts = Post::orderBy('id','desc')->paginate(1);
        }
        return view('home',['posts'=>$posts]);
    }

    public function detail(Request $request, $slug ,$postId)
    {
        Post::find($postId)->increment('views');
        $detail = Post::find($postId);
        return view('detail',['detail'=>$detail]);
    }

    public function category(Request $request, $cat_slug, $cat_id)
    {
        $category = Category::find($cat_id);
        $posts = Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(1);
        return view('category',['posts'=>$posts, 'category'=>$category]);
    }

    public function all_categories()
    {
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('categories',['categories'=>$categories]);
    }

    public function save_comment(Request $request,$slug,$id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $data = new Comment;
        $data->user_id = $request->user()->id;
        $data->post_id = $id;
        $data->comment = $request->comment;
        $data->save();

        return redirect('detail/'.$slug.'/'.$id)->with('success','Comment has been submitted!');
    }

    public function save_post_form()
    {
        $cats = Category::all();
       return view('save-post-form',['cats' => $cats]);
    }

    public function save_post_data(Request $request)
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

        $post->user_id = $request->user()->id;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $newThumbimage;
        $post->full_img = $newFullimage;
        $post->detail = $request->detail;
        $post->tags = $request->tags;
        $post->status = 1;
        $post->save();

        return redirect('save-post-form')->with('success', "Data has been added");
    }

    public function manage_posts(Request $request)
    {
        $data = Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
        return view('manage-posts',['data'=> $data]);
    }

}
