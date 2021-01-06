<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	@include('client.shared.script')
	@include('client.shared.link')
</head>
<body>
	<div class="container">
		@include('client.shared.headerShowProduct')
		@include('client.shared.logoMenuChiTiet')
		<div class="col-md-12 brand">
			@foreach($product as $key => $product)
			<div class="sp col-md-3 float-left">
				<div class="box-sp">
				<a href="{{route('home.show',$product->id)}}">
					<img src="{{asset('images/')}}/{{$product->product_image}}">
					<b>{{Str::limit($product->product_name,16,' ...')}}</b>
					<p>{{$product->price}}đ</p>
				</a>						
				</div>
			</div>
			@endforeach()

		</div>

	</div>
	@include('client.shared.footer')
</body>
</html>