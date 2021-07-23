<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function register()
    {
        return view('backend.register');
    }

    public function create_admin(Request $request)
    {
        // Validation
        $this->validate($request, [
            'username' => 'required | max:25',
            'password' => 'required | confirmed',
        ]);
// dd("safe");
        // Store User
        Admin::create([
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);

        // Sign the user in

        // Redirect
        return redirect('admin/login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);   
        
        $userCheck = Admin::where(['username'=>$request->username,'password'=>$request->password])->count();

        if($userCheck>0){
            $adminData = Admin::where(['username'=>$request->username,'password'=>$request->password])->first();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }
        else{
            return redirect('admin/login')->with('error','Invalid Username/Password!!');
        }

    }
    // Dashboard
    public function dashboard()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('backend.dashboard',['posts'=>$posts]);
    }

    // Show all Comments
    public function comments()
    {
        $data = Comment::orderBy('id','desc')->get();
        return view('backend.comment.index',['data'=>$data]); 
    }

    // Delete Comment
    public function comment_delete($id)
    {
        Comment::where('id',$id)->delete();
        return redirect('admin/comment');
    }

    // Show all Users
    public function users()
    {
        $data = User::orderBy('id','desc')->get();
        return view('backend.user.index',['data'=>$data]); 
    }

    // Delete User
    public function user_delete($id)
    {
        User::where('id',$id)->delete();
        return redirect('admin/user');
    }

    // Logout
    public function logout()
    {
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
