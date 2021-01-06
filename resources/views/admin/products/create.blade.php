@extends('admin.layouts.layoutAdmin')
@section('title','Create Product')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-gray-dark">Create Product</h3>
    </div>
      <div class="card-body">
        {{ Form::open([ 'url'=>'admin/products','method'=>'post','enctype'=>"multipart/form-data" ])}}
        <div class="col-12">

          <div class="row">
            <div class="form-group col-6 ">
              {{ Form::label('Product Code')}}
              {{ Form::text('product_code','',['class'=>'form-control '])}}
              <span class="text-danger">{{$errors->first('product_code') }}</span>
            </div>
            <div class="form-group col-6">
              {{ Form::label('Product Name')}}
              {{ Form::text('product_name','',['class'=>'form-control '])}}
              <span class="text-danger">{{$errors->first('product_name') }}</span>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6 ">
                {{ Form::label('Logo')}}
                <input type="file" name="image" required="true">
                <span class="text-danger">{{$errors->first('product_image') }}</span>
              </div>
            <div class="form-group col-6">
              {{ Form::label('Description')}}
              {{ Form::text('description','',['class'=>'form-control '])}}
              <span class="text-danger">{{$errors->first('description') }}</span>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              {{ Form::label('Price')}}
              {{ Form::text('price','',['class'=>'form-control '])}}
              <span class="text-danger">{{$errors->first('price') }}</span>
            </div>
            <div class="form-group col-6">
              {{ Form::label('Brand Name')}}
              {{ Form::select('brand_id',$brands,null,['class'=>'form-control ','id'=>'brands','placeholder'=>'Choose a brand'])}}
              <span class="text-danger">{{$errors->first('brand_id') }}</span>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6 ">
              {{ Form::label('Category')}}
              {{ Form::select('category_id',$categories,null,['class'=>'form-control ','id'=>'categories','placeholder'=>'Choose a category'])}}
              <span class="text-danger">{{$errors->first('category_id') }}</span>
            </div>
            <div class="form-group col-6 ">
              {{ Form::label('City')}}
              {{ Form::select('city_id',$cities,null,['class'=>'form-control ','id'=>'cities','placeholder'=>'Choose the city'])}}
              <span class="text-danger">{{$errors->first('city_id') }}</span>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
            {{ Form::label('Color Name')}}
              {{ Form::select('color_id',$colors,null,['class'=>'form-control ','id'=>'colors','placeholder'=>'Choose a color'])}}
              <span class="text-danger">{{$errors->first('color_id') }}</span>
            </div>
          </div>
            {{Form::submit('Create',["class"=> "btn btn-success"])}}
            <a href="{{ route('products.index')}}" class=" btn btn-primary">Back</a>
          
          </div>
        {{ Form::close()}}
            
      </div>
 </div>
 </div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection