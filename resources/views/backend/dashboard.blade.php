@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        {{-- <h1>admin in logged In</h1> --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"> {{ App\Models\Category::count() }} Categories</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('admin/category') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> {{ App\Models\Post::count() }} Posts</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('admin/post') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> {{ App\Models\Comment::count() }} Comments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('admin/comment') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"> {{ App\Models\User::count() }} Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('admin/user') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
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
                                        @foreach ($posts as $post)
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
       