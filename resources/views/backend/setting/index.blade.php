@extends('layouts.admin')

@section('title')
    Manage Settings
@endsection

@section('content')
            <div class="container p4">
                <div class="d-flex justify-content-between">
                    <h2 class="m-3 d-inline">Settings</h2>
                    {{-- <a href="{{ url('admin/post') }}" class="btn btn-primary m-3">All Data</a> --}}
                </div>
                
                @if ($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger m-3" role="alert">
                       {{$error}}
                      </div>
                    @endforeach
                @endif

                @if (Session::has('success'))
                <div class="alert alert-success m-3" role="alert">
                    {{ Session::get('success') }}
                  </div>
                @endif

                <form action="{{ url('admin/setting') }}" method="post" class="m-3" enctype="multipart/form-data">
                    @csrf
                   

                    <div class=" mb-3 row">
                        <p class="form-label h5 col">Comment Auto Approve</p>
                        <input type="text" @if ($setting) value = "{{ $setting->comment_auto }}" @endif class="form-control col" name="comment_auto">                        
                      </div>

                    <div class=" mb-3 row">
                        <p class="form-label h5 col">User Auto Approve</p>
                        <input type="text" @if ($setting) value = "{{ $setting->user_auto }}" @endif class="form-control col" name="user_auto">                        
                      </div>

                    <div class=" mb-3 row">
                        <p class="form-label h5 col">Recent Post Limit</p>
                        <input type="text" @if ($setting) value = "{{ $setting->recent_limit }}" @endif class="form-control col" name="recent_limit">                        
                      </div>

                    <div class=" mb-3 row">
                        <p class="form-label h5 col">Popular Post Limit</p>
                        <input type="text" @if ($setting) value = "{{ $setting->popular_limit }}" @endif class="form-control col" name="popular_limit">                        
                      </div>

                    <div class=" mb-3 row">
                        <p class="form-label h5 col">Recent Comment Limit</p>
                        <input type="text" @if ($setting) value = "{{ $setting->recent_comment_limit }}" @endif class="form-control col" name="recent_comment_limit">                        
                      </div>

                      
                   
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
      
@endsection