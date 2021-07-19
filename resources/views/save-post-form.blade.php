@extends('layouts.homelayout')

@section('title')
    Save Post
@endsection

@section('content')




<main class="container">
    <div class="row mt-5">

        <div class="col-md-8">
            <h3>Add Post</h3>        
            
            <form action="{{ url('save-post-form') }}" method="post" class="m-3" enctype="multipart/form-data">
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