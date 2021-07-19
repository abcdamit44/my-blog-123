@extends('layouts.admin')

@section('title')
    Create
@endsection

@section('content')
            <div class="container p4">
                <div class="d-flex justify-content-between">
                    <h2 class="m-3 d-inline">Post</h2>
                    <a href="{{ url('admin/post') }}" class="btn btn-primary m-3">All Data</a>
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

                <form action="{{ url('admin/post') }}" method="post" class="m-3" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="form-label h5">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-select @error('category')
                            border border-danger
                        @enderror" aria-label="Default select example">
                            @foreach ($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class=" mb-3">
                        <p class="form-label h5" for="title">Title <span class="text-danger">*</span></p> 
                        <input type="text" class="form-control @error('title')
                        border border-danger
                    @enderror"" id="title" name="title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="post_thumb" name="post_thumb">
                        <label class="input-group-text" for="post_thumb">Thumbnail</label>
                      </div>

                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="post_image" name="post_image">
                        <label class="input-group-text" for="post_image">Full Image</label>
                      </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label h5">Detail <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('detail')
                        border border-danger
                    @enderror" id="detail" rows="3" name="detail" placeholder="Add Your Detail" ></textarea>
                        @error('detail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label h5">Tags</label>
                        <textarea class="form-control" id="tags" rows="3" name="tags" placeholder="Add Your Tags"></textarea>
                        @error('tags')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
      
@endsection