@extends('admin.layouts.layoutAdmin')
@section('title','Show Brand')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Brand Detail</h3>
        </div>
        <div class="card-body">

          <div class="table-responsive">
             <br>
                <div class="col-3">
                  <p>Product Code: {{ $product->product_code}}</p>
                </div>

                <div class="col-3">
                  <p>Product Name: {{ $product->product_name}}</p>
                </div>

                <div class="col-3">
                  <p>Description: {{ $product->description}}</p>
                </div>

                <div class="col-3">
                  <p>Price: {{ $product->price}}</p>
                </div>

                

                
                <a style="margin-left: 15px" href="{{ route('products.index')}}" class="btn btn-primary">Back</a>
            
          </div>
        </div>
    </div>
 </div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection