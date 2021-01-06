@extends('Admin.layouts.layoutAdmin')
@section('title','ADMIN')
@section('content')

<div class="container-fluid home mt-5">
  <h2>DASHBOARD</h2>
  <div class="col-md-12 text-center float-left shadow p-3 mb-5 bg-white rounded">
    <div class="count col-md-3 float-left border-right">
      <a href="{{route('products.index')}}">
        <i class="fab fa-product-hunt text-primary" style="font-size: 100px"></i>
      </a>
      <p style="font-size: 40px">{{count($product)}}</p>
    </div>
    <div class="count col-md-3 float-left border-right">
      <a href="">
        <i class="fas fa-user text-success" style="font-size: 100px"></i>
      </a>
      <p style="font-size: 40px">
        {{count($user)}}
      </p>
    </div>
    <div class="count col-md-3 float-left border-right">
      <a href="">
        <i class="fas fa-shopping-cart text-info" style="font-size: 100px"></i>
      </a>
      <p style="font-size: 40px">{{count($orders_details)}}</p>
    </div>
    <div class="count col-md-3 float-left">
      <a href="">
        <i class="fas fa-comments text-warning" style="font-size: 100px"></i>
      </a>
      <p style="font-size: 40px">{{count($comment)}}</p>
    </div>
  </div>
</div>

@endsection
@section('script')
@include('admin.shared.script')
@include('Admin.Shared.scriptModal')
@endsection