@extends('layouts.homelayout')

@section('title')
    Home
@endsection

@section('content')




<main class="container">
    <div class="row mt-5">

{{-- Post Section Start  --}}

        <div class="col-md-8">
            <div id="post-data">
            @if ($posts->count())
                @include('posts')
            @else
                <p class="alert alert-danger">No Post Found !</p>
            @endif
        </div>
        {{-- <div class="ajax-load text-center w-25 d-flex justify-content-center m-auto" style="display: none !impotant">
            <img src="{{ asset('gifs/loader.gif') }}" alt="loader" class="w-50">
        </div> --}}
        </div>

       

{{-- Post Section End --}}

{{-- Right Sidebar Start --}}

        <div class="col-md-4 d-none d-sm-block">

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
                            <a href="{{ url('detail/'. Str::slug($post->title). '/' .$post->id) }}" class="list-group-item">{{ $post->title }}</a>
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
                        <a href="{{ url('detail/'. Str::slug($post->title). '/' .$post->id) }}" class="list-group-item">{{ $post->title }} <span class="badge bg-info">{{ $post->view }}</span></a>
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


<script>
function loadMoreData(page){
    $.ajax({
        url: "?page=" + page,
        type: 'get',
        beforeSend: function(){
            $(".ajax-load").show();
        }
    })
    .done(function(data){
        if(data.html == " "){
            $(".ajax-load").html("No more records found");
            return;
        }
        $('.ajax-load').css('display','none !impotant');
        $("#post-data").append(data.html);
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('Server not responding...')
    });
}

var page = 1;
$(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
    page++;
    loadMoreData(page);
}
});

</script>

@endsection