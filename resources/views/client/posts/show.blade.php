<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('seo')
<head>
    <title>{{$post->title}}</title>
    @include('client.shared.script')
    @include('client.shared.link')
</head>
<body>
    @section('seo')
    <!-- google -->
    <meta name="DC.title" content="{{ isset($post->title) ? $post->title : 'sẽ cập nhật sau' }}">
    <meta name="keywords" content="{{ isset($post->seo->first()->keywords) ? $post->seo->first()->keywords : 'sẽ cập nhật sau...' }}">
    <meta name="desc" content="{{ isset($post->seo->first()->desc) ? $post->seo->first()->desc : 'sẽ cập nhật sau'  }}">
    <!-- image -->

    <!-- url - slug -->
        <meta name="url" content="{{ url(Str::slug($post->title,'-')) }}">
    <!-- facebook -->

    <!-- linkedin -->
    
    @endsection()
    
    <div class="container">
        @include('client.shared.headerShowProduct')
        @include('client.shared.logoMenuChiTiet')
        <img  src=""> {!! $post->content!!}
        
    </div>
    @include('client.shared.footer')

</body>
</html>