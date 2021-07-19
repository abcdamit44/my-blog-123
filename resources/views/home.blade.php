@extends('layouts.homelayout')

@section('title')
    Home
@endsection

@section('content')




<main class="container">
    <div class="row mt-5">

{{-- Post Section Start  --}}

        <div class="col-md-8">
            @if ($posts->count())
                @foreach ($posts as $post)
                <div class="row">
                    <div class="card p-0 mb-5">
                        <img src="{{ asset('images') }}/{{ $post->thumb }}" class="card-img-top" alt="{{ $post->title }}" width="200">
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->detail }}</p>
                        <a href="{{ url('detail/'. Str::slug($post->title). '/' .$post->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- Pagination start --}}

                {{ $posts->links() }}

                {{-- Pagination end --}}
            @else
                <p class="alert alert-danger">No Post Found !</p>
            @endif
        </div>

{{-- Post Section End --}}

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

            {{-- Search Recent Post Section Start --}}

            <div class="card mt-3">
                <div class="card-header">Recent Post</div>
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

            {{-- Search Recent Post Section End --}}

            {{-- Search Popular Post Section Start --}}

            <div class="card mt-3">
                <div class="card-header">Popular Post</div>
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

            {{-- Search Popular Post Section End --}}
        </div>

{{-- Right Sidebar End --}}

    </div>
</main>

{{-- Post Section End --}}

@endsection