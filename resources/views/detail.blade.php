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
            <img src="{{ asset('images') }}/{{ $detail->full_img }}" class="img-thumbnail w-50" alt="{{ $detail->title }}">
        </div>
        <h1 class="text-center mt-4"> {{ $detail->title }} <span class="float-right badge rounded-pill bg-primary fs-6 align-items-center ">Total views = {{ $detail->views }}</span></h1>

        <div class="w-100 text-center">
            {{ $detail->detail }}
        </div>

        <div class="fs-6">
           <span class="lead f-3 fw-bold">Category-</span> <a href="{{ url('category/'.Str::slug($detail->category->title).'/'.$detail->category->id) }}" class="link-primary">{{ $detail->category->title }}</a>
        </div>
        <hr>

        {{-- Add Comment --}}
        @auth
        <div class="card my-3 w-50 m-auto">
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
        @endauth

        {{-- Fetch Comments --}}
        <div class="card my-5 w-50 m-auto">
            <div class="card-header">
                <h5 class="h5">Comments <span class="badge bg-dark">{{ count($detail->comments) }}</span></h5>
            </div>
            <div class="card-body">
                @if ($detail->comments)
                    @foreach ($detail->comments as $comment)
                    <figure>
                        <blockquote class="blockquote">
                          <p>{{ $comment->comment }}</p>
                        </blockquote>
                        @if ($comment->user_id == 0)
                        <figcaption class="blockquote-footer">
                            Admin
                          </figcaption>
                        @else
                        <figcaption class="blockquote-footer">
                            {{ $comment->user->name }}
                          </figcaption> 
                        @endif
                        
                      </figure>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection