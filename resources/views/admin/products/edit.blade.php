@extends('admin.layouts.layoutAdmin')
@section('title','Edit Product')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Edit Product</h3>
        </div>
        <div class="card-body">
    {{Form::open(['route'=>['products.update',$product->id],'method'=>'put'])}}
    
    <div class="col-12">
      <div class="row">
          <div class="form-group col-6 ">
            {{ Form::label('Product Code')}}
            {{ Form::text('product_code',$product->product_code,['class'=>'form-control '])}}
            <span class="text-danger">{{$errors->first('product_code') }}</span>
          </div>
          <div class="form-group col-6">
            {{ Form::label('Product Name')}}
            {{ Form::text('product_name',$product->product_name,['class'=>'form-control '])}}
            <span class="text-danger">{{$errors->first('product_name') }}</span>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            {{ Form::label('Description')}}
            {{ Form::text('description',$product->description,['class'=>'form-control '])}}
            <span class="text-danger">{{$errors->first('description') }}</span>
          </div>
          <div class="form-group col-6">
            {{ Form::label('Price')}}
            {{ Form::text('price',$product->price,['class'=>'form-control '])}}
            <span class="text-danger">{{$errors->first('price') }}</span>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            {{ Form::label('Brand Name')}}
            {{ Form::select('brand_id',$brand,$product->brand_id,['class'=>'form-control ','id'=>'brand'])}}
            
          </div>
          <div class="form-group col-6">
            {{ Form::label('Category Name')}}
            {{ Form::select('category_id',$category,$product->category_id,['class'=>'form-control ','id'=>'category'])}}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            {{ Form::label('City Name')}}
            {{ Form::select('city_id',$city,$product->city_id,['class'=>'form-control ','id'=>'city'])}}
            
          </div>
          <div class="form-group col-6">
            {{ Form::label('Color')}}
            {{ Form::select('color_id',$color,$product->color_id,['class'=>'form-control ','id'=>'color'])}}
          </div>
        </div>
          {{Form::submit('Upload',["class"=> "btn btn-success"])}}
          <a href="{{ route('products.index')}}" class="btn btn-primary">Back</a>
          </div>
    {{ Form::close()}}
        </div>
 </div>
@endsection
@section('script')
@include('admin.shared.script')
@endsection