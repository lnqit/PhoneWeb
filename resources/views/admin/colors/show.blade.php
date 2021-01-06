@extends('admin.layouts.layoutAdmin')
@section('title','Danh sách Color')
@section('content')
 <div class="container-fluid mt-5">
 	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Color Detail</h3>
        </div>
        <div class="card-body">

          <div class="table-responsive">
			       <br>
                <div class="col-3">
                  <p>Color Name: {{ $color->name}}</p>
                </div>

                <div class="col-3">
                  
                  <p style="background-color:{{$color->color}}"> Color</p>
                </div>

                
                <a style="margin-left: 15px" href="{{ route('colors.index')}}" class="btn btn-primary">Back</a>
            
          </div>
        </div>
    </div>
 </div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection