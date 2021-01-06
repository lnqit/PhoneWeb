@extends('admin.layouts.layoutAdmin')
@section('title','Create Category')
@section('content')
 <div class="container-fluid  mt-5 ">
  <div class="card shadow mb-4 bg-ce  justify-content-center align-items-center ">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3 col-12">
          <h3 class="m-0 font-weight-bold text-gray-dark">Create Category</h3>
        </div>
        <div class="card-body col-8 ">
          {{ Form::open([ 'url'=>'admin/categories','method'=>'post' ])}}
          <div class="col-12">
            <div class="form-group ">
              {{ Form::label('Category Name')}}
              {{ Form::text('name','',['class'=>'form-control '])}}
              <span class="text-danger">{{$errors->first('name') }}</span>
            </div>
            <div class="form-group ">
              {{ Form::label('Description')}}
              <textarea name="description" id="demo" rows="3" class="form-control"></textarea>
              <span class="text-danger">{{$errors->first('description') }}</span>
            </div>
            {{Form::submit('Create',["class"=> "btn btn-success"])}}
            <a href="{{ route('categories.index')}}" class="btn btn-primary">Back</a>
          {{ Form::close()}}
          </div>
        </div>
 </div>
</div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection