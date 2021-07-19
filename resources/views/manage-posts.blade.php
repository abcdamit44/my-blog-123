@extends('layouts.homelayout')

@section('title')
    Manage Post
@endsection

@section('content')




<main class="container">
    <div class="row mt-5">

        <div class="col-md-8">
            <h3>Manage Post</h3>        
          
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Full Image</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Full Image</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->category->title }}</td>
                            <td>{{ $post->title }}</td>
                            <td><img src="{{ asset('images'.'/'.$post->thumb) }}" alt="Image" width="100"></td>
                            <td><img src="{{ asset('images'.'/'.$post->full_img) }}" alt="Image" width="100"></td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                          
        </div>


{{-- Right Sidebar Start --}}

        <div class="col-md-4">

            {{-- Search section Start --}}

            <div class="card mt-3">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <form action="{{ url('/') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search">
                            <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Search section End --}}

            {{-- Search Recent post Section Start --}}

            <div class="card mt-3">
                <div class="card-header">Recent post</div>
                <div class="card-body">
                  <div class="list-group list-group-flush">
                      @if ($recent_posts)
                        @foreach ($recent_posts as $post)
                            <a href="#" class="list-group-item">{{ $post->title }}</a>
                        @endforeach                          
                      @endif
                  </div>
                </div>
            </div>

            {{-- Search Recent post Section End --}}

            {{-- Search Popular post Section Start --}}

            <div class="card mt-3">
                <div class="card-header">Popular post</div>
                <div class="card-body">
                  <div class="list-group list-group-flush">
                    @if ($popular_posts)
                    @foreach ($popular_posts as $post)
                        <a href="#" class="list-group-item">{{ $post->title }} <span class="badge bg-info">{{ $post->view }}</span></a>
                    @endforeach                          
                  @endif
                  </div>
                </div>
            </div>

            {{-- Search Popular post Section End --}}
        </div>

{{-- Right Sidebar End --}}

    </div>
</main>

{{-- category Section End --}}

@endsection