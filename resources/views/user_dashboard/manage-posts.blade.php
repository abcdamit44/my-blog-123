@extends('layouts.homelayout')

@section('title')
    Manage Post
@endsection

@section('content')




<main class="container">
    <div class="row mt-5">

        <div class="col">
            <h3>Dashboard</h3>        
          
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
                                <a href="{{ url('manage-posts/'.$post->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ url('manage-posts/'.$post->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
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