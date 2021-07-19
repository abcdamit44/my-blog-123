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

                <form action="{{ url('admin/category/'.$data->id) }}" method="post" class="m-3" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title" class="form-label h5">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" placeholder="Enter Your Title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label h5">Detail</label>
                        <textarea class="form-control" id="detail" rows="3" name="detail" value="{{ $data->details }}" placeholder="Add Your Description">{{ $data->details }}</textarea>
                        @error('detail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="m-3">
                        <img src="{{ asset('images') }}/{{ $data->image }}" alt="" width="100">
                    </p>
                    <div class="input-group mb-3">
                        <input type="hidden" value="{{ $data->image }}" name="cat_image">
                        <input type="file"  name="cat_image">
                        <label class="input-group-text" for="cat-image">Upload</label>
                      </div>
                      @error('cat_iamge')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
        
@endsection