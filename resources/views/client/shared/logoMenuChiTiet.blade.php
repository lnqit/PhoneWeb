<div class="container">
	<div class="logonavigation">
		<div class="logo">
			<a href="{{route('home.index')}}"><img src="{{asset('images/img_title.png')}}"></a>
		</div>
		{!! Form::open(['route'=>'search', 'method'=>'get']) !!}
			<div class="search">
					<div class="text">
						{{ Form::text('search','',['class'=>'s','placeholder'=>'Search Keywords']) }}
					</div>

					<div class="icon1">
						 {{Form::submit('Search',["class"=> "btn btn-primary"])}}
					</div>
			</div>
		{!! Form::close() !!}
		<div class="by">
			<ul>
				
				<li class="nav-item"><a class="nav-link" href="{{route('cart.index')}}" title=""><i class="fa fa-shopping-cart"></i> ({{Cart::count()}})</a></li>
					@if (Route::has('login'))
					<div class="top-right links">
						@auth
							@else
							<li><a href="{{ route('login') }}">Login</a></li>

							@if (Route::has('register'))
								<li><a href="{{ route('register') }}">Register</a></li>
							@endif
						@endauth
					</div>
					@endif
				@if (Auth::check())
					<form class="float-right" id="logout-form" action="{{ url('logout') }}" method="POST">
					    {{ csrf_field() }}
					    <button type="submit" class="btn btn-danger">Logout</button>
					</form>
					<form class="float-right mt-2 mr-3">
						{{Auth::user()->name}}
					</form>
				@endif
			</ul>
		</div>
	</div>
</div>
<div class="menu">
			  <ul>
			    <li><a href="{{route('blog')}}">Blog</a></li>
			  	<li><a href="{{route('historyOrder')}}">History Order</a></li>
			    
			  </ul>
		</div>