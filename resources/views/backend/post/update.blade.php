@extends('layouts.admin')

@section('title')
    Create
@endsection

@section('content')
            <div class="container p4">
                <div class="d-flex justify-content-between">
                    <h2 class="m-3 d-inline">Update Post</h2>
                    <a href="{{ url('admin/post') }}" class="btn btn-primary m-3">All Data</a>
                </div>
                
                @if ($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-success m-3" role="alert">
                       {{$error}}
                      </div>
                    @endforeach
                @endif

                @if (Session::has('success'))
                <div class="alert alert-success m-3" role="alert">
                    {{ Session::get('success') }}
                  </div>
                @endif

                <form action="{{ url('admin/post/'.$data->id) }}" method="post" class="m-3" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3">

                        <label for="category" class="form-label h5">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-select @error('category')
                            border border-danger
                        @enderror" aria-label="Default select example">
                            @foreach ($cats as $cat)
                            @if ($cat->id == $data->cat_id)

                             <option selected value="{{ $cat->id }}">{{ $cat->title }}</option>
                            
                            @else
                            
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endif

                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="title" class="form-label h5">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" placeholder="Enter Your Title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <p class="m-3">
                        <img src="{{ asset('images') }}/{{ $data->thumb }}" alt="" width="100">
                    </p>
                    <div class="input-group mb-3">
                        <input type="hidden" value="{{ $data->thumb }}" name="post_thumb">
                        <input type="file"  name="post_thumb">
                        <label class="input-group-text" for="post_thumb">Thumbnail</label>
                      </div>
                      @error('post_thumb')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    <p class="m-3">
                        <img src="{{ asset('images') }}/{{ $data->full_img }}" alt="" width="100">
                    </p>
                    <div class="input-group mb-3">
                        <input type="hidden" value="{{ $data->full_img }}" name="post_image[]" multiple>
                        <input type="file"  name="post_image[]" multiple>
                        <label class="input-group-text" for="post_image">Full Image</label>
                      </div>
                      @error('post_image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    <div class="mb-3">
                        <label for="detail" class="form-label h5">Detail</label>
                        <textarea class="form-control" id="detail" rows="3" name="detail" value="{{ $data->detail }}" placeholder="Add Your Description">{{ $data->detail }}</textarea>
                        @error('detail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label h5">Tags</label>
                        <textarea class="form-control" id="tags" rows="3" name="tags" value="{{ $data->tags }}" placeholder="Add Your Description">{{ $data->tags }}</textarea>
                        @error('tags')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
        
@endsection