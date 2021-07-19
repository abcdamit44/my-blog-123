@extends('layouts.admin')

@section('title')
    Create
@endsection

@section('content')
            <div class="container p4">
                <div class="d-flex justify-content-between">
                    <h2 class="m-3 d-inline">Category</h2>
                    <a href="{{ url('admin/category') }}" class="btn btn-primary m-3">All Data</a>
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

                <form action="{{ url('admin/category') }}" method="post" class="m-3" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label h5">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label h5">Detail</label>
                        <textarea class="form-control" id="detail" rows="3" name="detail" placeholder="Add Your Description"></textarea>
                        @error('detail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="cat-image" name="cat_image">
                        <label class="input-group-text" for="cat-image">Upload</label>
                      </div>
                      @error('cat_iamge')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
      
@endsection