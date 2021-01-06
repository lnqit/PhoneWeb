@extends('admin.layouts.layoutAdmin')
@section('title','Danh sách Brands')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Create Brand</h3>
        </div>
        <div class="card-body">
          {{ Form::open([ 'url'=>'admin/brands','method'=>'post', 'enctype'=>"multipart/form-data" ])}}
          <div class="col-6">
            <div class="form-group ">
              {{ Form::label('Brand Name')}}
              {{ Form::text('name','',['class'=>'form-control '])}}
              <span class="text-danger">{{$errors->first('name') }}</span>
            </div>
            <div class="form-group ">
              {{ Form::label('Logo')}}
              <input type="file" name="image" required="true">
              <span class="text-danger">{{$errors->first('name') }}</span>
            </div>
            <div class="form-group ">
              {{ Form::label('Description')}}
              <textarea name="description" id="demo" rows="3" class="form-control"></textarea>
              <span class="text-danger">{{$errors->first('description') }}</span>
            </div>
            {{Form::submit('Create',["class"=> "btn btn-success"])}}
            <a href="{{ route('brands.index')}}" class="btn btn-primary">Back</a>
          {{ Form::close()}}
              </div>
        </div>
 </div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection