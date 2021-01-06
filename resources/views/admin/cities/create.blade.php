@extends('admin.layouts.layoutAdmin')
@section('title','Create City')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4 bg-ce justify-content-center align-items-center  ">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3 col-12 ">
          <h3 class="m-0 font-weight-bold text-gray-dark">Create City</h3>
        </div>
        <div class="card-body col-8">
          {{ Form::open([ 'url'=>'admin/cities','method'=>'post' ])}}
          <div class="col-12">
            <div class="form-group ">
              {{ Form::label('City Name')}}
              {{ Form::text('name','',['class'=>'form-control '])}}
              <span class="text-danger">{{$errors->first('name') }}</span>
            </div>
            <div class="form-group ">
              {{ Form::label('City Code')}}
              {{ Form::textarea('postcode','',['class'=>'form-control ','rows'=>'3'])}}
              <span class="text-danger">{{$errors->first('postcode') }}</span>
            </div>
            {{Form::submit('Create',["class"=> "btn btn-success"])}}
            <a href="{{ route('cities.index')}}" class="btn btn-primary">Back</a>
          {{ Form::close()}}
              </div>
        </div>
 </div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection