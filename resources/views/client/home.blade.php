<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Home</title>
	<script src="https://kit.fontawesome.com/398f88adde.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/client/reset.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/client/home.css')}}">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('css/client/responsivehome.css')}}">
	@yield('seo')
</head>
<body>
	@include('client.shared.headerShowProduct')

	<div id="boxcontent">
		<div class="container">
			@include('client.shared.logoMenuChiTiet')
			@include('client.shared.menuhome')
			@include('client.shared.logoHome')
			<div class="container">
				<div class="box-2">
					<h3>PHONE IS INTERESTED</h3>
					<hr>
					@foreach($product as $key => $product)
					<div class="sp">
						<div class="box-sp">
							<a href="{{route('home.show',$product->id)}}">
								<img src="{{asset('images/')}}/{{$product->product_image}}">
								<b>{{Str::limit($product->product_name,17,' ...')}}</b>
								<p>{{$product->price}}đ</p>
							</a>						
						</div>
					</div>
					@endforeach()
				</div>
			</div>			
		</div>
	</div>

	@include('client.shared.footer')
	
</body>
</html>