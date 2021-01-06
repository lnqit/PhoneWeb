<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	@include('admin.shared.script')
	@include('admin.shared.links')
</head>
<body>
	<div class="container col-md-12">
		<div class="row">
			<div class="col-md-2 menu">
				@include('admin.shared.menu')
			</div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12 body">
						<div class="row">
							<div class="col-md-12 header shadow pb-2 pt-2 bg-white rounded">
								@if (Auth::check())
									<form class="float-right" id="logout-form" action="{{ url('logout') }}" method="POST">
									    {{ csrf_field() }}
									    <button type="submit" class="btn btn-danger">Logout</button>
									</form>
									<form class="float-right mt-2 mr-3">
										{{Auth::user()->name}}
									</form>
								@endif
							</div>
						</div>
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
				<script type="text/javascript">
					CKEDITOR.replace( 'ckeditor' );
				</script>