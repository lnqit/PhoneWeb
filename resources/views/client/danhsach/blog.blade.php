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
	<title>Blogs List</title>
	@include('client.shared.script')
	@include('client.shared.link')
</head>
<body>
	<div class="container">
		@include('client.shared.headerShowProduct')
		@include('client.shared.logoMenuChiTiet')
		<div class="col-md-12">
			@foreach($post as $key => $post)
			
			<div class="col-md-12 card float-left mt-2 mb-2">
				<a href="{{route('showBlog',$post->id)}}">
					<h2>{{$post->title}}</h2>
				</a>
				<p>{!! Str::limit($post->content,250,'...')!!}</p>
			</div>
			
			@endforeach()

		</div>

	</div>
	@include('client.shared.footer')
</body>
</html>