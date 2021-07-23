@foreach ($posts as $post)
                <div class="row my-posts endless-pagination" data-next-page="{{ $posts->nextPageUrl() }}">
                    <div class="card p-0 mb-5">
                        @if($post->thumb)
                        <a href="{{ asset('images') }}/{{ $post->thumb }}" class="fancybox" data-caption="{{ $post->title }}" data-id="{{ $post->id }}" data-fancybox="all">
                        <img src="{{ asset('images') }}/{{ $post->thumb }}" class="card-img-top" alt="{{ $post->title }}"                    
                        width="200">
                    </a>
                        @endif
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text d-none d-sm-block">{{ $post->detail }}</p>
                        <a href="{{ url('detail/'. Str::slug($post->title). '/' .$post->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
@endforeach