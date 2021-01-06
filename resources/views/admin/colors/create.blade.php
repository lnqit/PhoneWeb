@extends('admin.layouts.layoutAdmin')
@section('title','Create Colors')

@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Create Colors</h3>
        </div>
        <div class="card-body">
          {{ Form::open([ 'url'=>'admin/colors','method'=>'post' ])}}
          <div class="col-12">
            <div class="form-group ">
              {{ Form::label('name','Color Name:',['class'=>'col-md-2 float-left mt-2'])}}
              {{ Form::text('name','',['class'=>'form-control col-md-5 float-left'])}}
              <span class="text-danger">{{$errors->first('name') }}</span>
            </div>

            <div id="cp2" class="input-group colorpicker-component">
              {{ Form::label('','',['class'=>'col-md-2 float-left'])}}
              {{ Form::text('color','#000000',['class'=>'form-control col-md-5 mt-3','id'=>'cp2'])}}
              <span class="input-group-addon"><i></i></span>
              <span class="text-danger">{{$errors->first('description') }}</span>
            </div>
            {{Form::submit('Create',["class"=> "btn btn-success"])}}
            <a href="{{ route('colors.index')}}" class="btn btn-primary">Back</a>
              </div>

        </div>
 </div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection