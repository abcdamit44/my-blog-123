@extends('layouts.homelayout')

@section('title')
    {{ $detail->title }}
@endsection

@section('content')
    <div class="container my-5">
        @if (Session::has('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div>
            <a href="{{ url('/') }}"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
        </div>
        
        <div class="text-center">
            <img src="{{ asset('images') }}/{{ $detail->thumb }}" class="img-thumbnail w-50" alt="{{ $detail->title }}">
        </div>
        <h1 class="text-center mt-4"> {{ $detail->title }} <span class="float-right badge rounded-pill bg-primary fs-6 align-items-center ">Total views = {{ $detail->views }}</span></h1>

        <div class="d-flex flex-row justify-content-center">
                @php
                    $image = DB::table('posts')->where('id',$detail->id)->first();
                    $images = explode('|', $image->full_img);
                @endphp
                    @foreach ($images as $item)
                        <img src="{{ URL::to($item) }}" class="card-img-top m-2 w-25" alt="...">
                    @endforeach
        </div>

        <div class="w-100 text-center">
            {{ $detail->detail }}
        </div>

        <div class="fs-6">
           <span class="lead f-3 fw-bold">Category-</span> <a href="{{ url('category/'.Str::slug($detail->category->title).'/'.$detail->category->id) }}" class="link-primary">{{ $detail->category->title }}</a>
        </div>
        <hr>

        

        {{-- Fetch Comments --}}
        <div class="card my-5 m-auto">
            <div class="card-header">
                <h5 class="h5">Comments <span class="badge bg-dark">{{ count($detail->comments) }}</span></h5>
            </div>
            <div class="card-body">
                @if ($detail->comments)
                    @foreach ($detail->comments as $comment)

                      <div class="shadow my-3 ">
                          <div class="d-flex align-items-center">
                            <h3 class="mx-3"> {{ $comment->user->name }}</h3>
                            <small>{{ $comment->user->created_at->diffForHumans() }}</small>  
                          </div>
                        <div class="p-3">
                            <div class="p-3">
                            <div class="m-1 border rounded bg-light p-3">
                                {{ $comment->comment }}
                                </div>
                            </div>
                            @auth
                                
                        
                        </div>
                        <div class="mx-5 p-3">
                            @if ($comment->replies->count())
                            @foreach ($comment->replies as $reply)
                            <div class="d-flex align-items-center">
                                <h5 class="me-1">{{ $reply->user->name }}</h5>
                                <small>{{ $reply->created_at->diffForHumans() }}</small>  
                            </div>
                            <div class="m-1 border rounded bg-light p-3">
                                {{ $reply->message }}
                            </div>
                            @endforeach
                            @else
                                <p class="text-dark">No Reply</p>
                            @endif
                            
                            <form action="{{ url('/comment/comment_reply/'.$comment->id)  }}"  method="POST" class="mt-2 d-flex justify-content-between p-2">
                                @csrf
                                <input type="text" name="comment_reply" class="form-control" placeholder="Reply">
                                <button type="submit" class="btn btn-dark mx-2">Send</button>
                            </form>
                        </div>
                        @endauth

                      </div>

                    @endforeach
                @endif
            </div>
        </div>

        {{-- Add Comment --}}
        
        <div class="card my-3 m-auto">
            <div class="card-header">
                <h5>Add Comment</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('save-comment/'.Str::slug($detail->title).'/'.$detail->id) }}">
                    @csrf
                    <textarea name="comment" class="form-control"></textarea>
                    <input type="submit" class="btn btn-dark my-2">
                </form>
            </div>
        </div>
       
        <br>
        
    </div>
@endsection