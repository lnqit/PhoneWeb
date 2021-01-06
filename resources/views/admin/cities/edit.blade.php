@extends('Admin.layouts.layoutAdmin')
@section('title','Edit City')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
  	@if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Edit City</h3>
        </div>
        <div class="card-body">
		{{Form::open(['route'=>['cities.update',$cities->id],'method'=>'put'])}}
		
		<div class="col-6">
			<div class="form-group ">
				{{ Form::label('City Name')}}
				{{ Form::text('name',$cities->name,['class'=>'form-control '])}}
				<span class="text-danger">{{$errors->first('title') }}</span>
			</div>
			<div class="form-group ">
				{{ Form::label('City code')}}
				{{ Form::textarea('postcode',$cities->postcode,['class'=>'form-control ','rows'=>'3'])}}
				<span class="text-danger">{{$errors->first('content') }}</span>
			</div>
			{{Form::submit('Upload',["class"=> "btn btn-success"])}}
			<a href="{{ route('cities.index')}}" class="btn btn-primary">Back</a>
		{{ Form::close()}}
		</div>
        </div>
 </div>
@endsection
@section('script')
@include('admin.shared.script')
@endsection