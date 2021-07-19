@extends('layouts.homelayout')

@section('title')
    All Categories
@endsection

@section('content')




<main class="container">
    <div class="row mt-5">

{{-- category Section Start  --}}

        <div class="col-md-8">
            @if ($categories->count())
                @foreach ($categories as $category)
                <div class="row">
                    <div class="card p-0 mb-5">
                        <img src="{{ asset('images') }}/{{ $category->image }}" class="card-img-top" alt="{{ $category->title }}" width="200">
                        <div class="card-body">
                        <h5 class="card-title">{{ $category->title }}</h5>
                        <p class="card-text">{{ $category->detail }}</p>
                        <a href="{{ url('detail/'. Str::slug($category->title). '/' .$category->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- Pagination start --}}

                {{ $categories->links() }}

                {{-- Pagination end --}}
            @else
                <p class="alert alert-danger">No category Found !</p>
            @endif
        </div>

{{-- category Section End --}}

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