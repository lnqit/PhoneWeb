<div class="container">
	<div class="box-3">
		<h3>TOP PHONE BRANDS</h3>
		@foreach($Brand as $key => $Brand)
		<div class="logohang">
			<a href="{{route('indexBrand',[$Brand->id])}}"><img style="width: 100px;margin-top: -10px" src="{{asset('images/')}}/{{$Brand->images}}"></a>
		</div>
		@endforeach()
	</div>
</div>