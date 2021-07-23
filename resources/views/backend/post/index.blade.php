@extends('layouts.admin')

@section('title')
    Post
@endsection

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Post</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <i class="fas fa-table me-1"></i>
                                Post Data
                                <a href="{{ url('admin/post/create') }}" class="btn btn-dark btn-sm ">Add Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>Full Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>Full Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->category->title }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                @if ($post->thumb)
                                                    <img src="{{ asset('images'.'/'.$post->thumb) }}" alt="Image" width="100">
                                                @else
                                                    <span class="text-dark">No Thumbnail</span>
                                                @endif
                                            </td>
                                            <td class="w-25">
                                                @php
                                                    $image = DB::table('posts')->where('id',$post->id)->first();
                                                    $images = explode('|', $image->full_img);
                                                @endphp
                                                    @foreach ($images as $item)
                                                    @if ($item)
                                                        @if (getimagesize($item))
                                
                                                        <a href="{{ URL::to($item) }}" class=" m-2 w-25 fancybox" data-caption="{{ $post->title }}" data-id="{{ $post->id }}" data-fancybox="all">
                                                            <img src="{{ URL::to($item) }}" class="card-img-top w-25" alt="...">
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to($item) }}" class=" m-2 w-25 fancybox" data-caption="{{ $post->title }}" data-id="{{ $post->id }}" data-fancybox="all">
                                                            <video class="w-25">
                                                                <source src="{{ URL::to($item) }}" class="card-img-top w-25" type="video/mp4">
                                                            </video>
                                                        </a>
                                                        @endif
                                                    @endif
                                                    
                                                    @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/post/'.$post->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>
                                                <a href="{{ url('admin/post/'.$post->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
@endsection
      