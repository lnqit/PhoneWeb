<div id="search_result" class="col-md-12">
    @foreach($post as $key => $post)
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('Admin.Posts.index', $post->id) }}"><h3>{{ $post->title }}</h3></a>
                <p>{{ $post->content }}</p>
                <a class="btn btn-success" href="{{ route('Admin.Posts.index', $post->id) }}">Xem chi tiết!</a>
                <br/><br/>
            </div>
        </div>  
    @endforeach        
</div>