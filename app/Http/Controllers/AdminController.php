<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;


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
            'name' => 'required | max:255',
            'email' => 'required | max:255 | email',
            'role' => 'required',
            'password' => 'required | confirmed',
        ]);

        // dd('store');

        // Store User
        User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'role' => $request->role,
            'password'=>Hash::make($request['password']),
        ]);

        $userCheck =  auth()->attempt($request->only('email','password'));
        
        if($userCheck && $request->role == 1){
            $adminData = auth()->attempt($request->only('email','password'));
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }
        else{
            return redirect('admin/login')->with('error','Invalid Credentials!!');
        }
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);   
        
        $userCheck = Admin::where(['email'=>$request->email,'password'=>$request->password])->count();
        $userCheck2 = auth()->attempt($request->only('email','password'));

        if($userCheck>0 || $userCheck2){
            if ($userCheck) {
                $adminData = Admin::where(['email'=>$request->email,'password'=>$request->password])->first();
                session(['adminData'=>$adminData]);
                return redirect('admin/dashboard');
            }
            else{
                $adminData = auth()->attempt($request->only('email','password'));
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
            }
        }
        else{
            return redirect('admin/login')->with('error','Invalid Username or Email/Password!!');
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
