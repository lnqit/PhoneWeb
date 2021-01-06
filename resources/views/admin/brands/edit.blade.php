@extends('Admin.layouts.layoutAdmin')
@section('title','Danh sách Brand')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
  	@if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Edit Brand</h3>
        </div>
        <div class="card-body">
		{{Form::open(['route'=>['brands.update',$brand->id],'method'=>'put'])}}
		
		<div class="col-6">
			<div class="form-group ">
				{{ Form::label('Brand Name')}}
				{{ Form::text('name',$brand->name,['class'=>'form-control '])}}
				
			</div>

			<div class="form-group ">
				{{ Form::label('Logo')}}
				{{ Form::file('images',$brand->image,['class'=>'form-control '])}}
			</div>

			<div class="form-group ">
				{{ Form::label('Description')}}
				{{ Form::textarea('description',$brand->description,['class'=>'form-control', 'rows' => '3', 'id' => 'demo']) }}
			</div>
			{{Form::submit('Upload',["class"=> "btn btn-success"])}}
			<a href="{{ route('brands.index')}}" class="btn btn-primary">Back</a>
		{{ Form::close()}}
		</div>
        </div>
 </div>
@endsection
@section('script')
@include('admin.shared.script')
@endsection