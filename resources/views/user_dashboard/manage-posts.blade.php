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
                            <td><img src="{{ asset('images'.'/'.$post->thumb) }}" alt="Image" width="100"></td>
                            <td class="w-25">
                                @php
                                    $image = DB::table('posts')->where('id',$post->id)->first();
                                    $images = explode('|', $image->full_img);
                                @endphp
                                    @foreach ($images as $item)
                                        <img src="{{ URL::to($item) }}" class="card-img-top m-2 w-25" alt="...">
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