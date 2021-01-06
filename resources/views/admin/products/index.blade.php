@extends('admin.layouts.layoutAdmin')
@section('title','Products List')
@section('content')
<div class="container-fluid mt-5">
  <div class="card shadow mb-4">
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @elseif(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-gray-dark">Products List</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <a class="btn btn-success" href="{{ route('products.create') }}">Add New</a>

        <div class= "card">
          <div class="card-body">
          {{ Form::open(['route' => ['products.index' ],'method' => 'get']) }}
            <div class="form-group col-12" style="float: left;">
              <div class="form-group col-6 float-left mt-0">
                {{ Form::label('Brand :')}}
                <select class="form-control" name="seachbrand">
                    <option value="null">Brands List</option>
                    @foreach ($brands as $key => $brands)
                      <option value="{{$brands->id}}" > 
                          {{ $brands->name }} 
                      </option>
                    @endforeach    
                </select>
              </div>
              <div class="form-group col-6 float-left mt-0">
                {{ Form::label('Category :')}}
                <select class="form-control" name="seachcategory">
                  <option value="null">Categories List</option>
                    @foreach ($categories as $key => $categories)
                      <option value="{{$categories->id}}" > 
                          {{ $categories->name }} 
                      </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-6 float-left mt-0">
                {{ Form::label('Color :')}}
                <select class="form-control" name="seachcolor">
                  <option value="null">Color List</option>
                    @foreach ($colors as $key => $Color)
                      <option value="{{$Color->id}}" > 
                          {{ $Color->name }} 
                      </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-6 float-left mt-0">
                {{ Form::label('City :')}}
                <select class="form-control" name="seachcity">
                  <option value="null">City List</option>
                    @foreach ($cities as $key => $City)
                      <option value="{{$City->id}}" > 
                          {{ $City->name }} 
                      </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-6 float-left mt-1">
                {{ Form::label('Name :')}}
                {{ Form::text('seachname','',['class'=>'form-control ','style'=>'float: left']) }}
                {{form::submit('Seach',['class'=>'btn btn-primary','style'=>'float: left']) }}
              </div>

            </div>
          {{ Form::close() }}
          </div>
          </div>
          <br>
        

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
          <tr>
            <th>STT</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Product Image</th>
            <th>Brands</th>
            <th>Category</th>
            <th>City</th>
            <th>Color</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody>
         @foreach($products as $key => $product)
         <tr>
          <td > {{++$key}} </td>
          <td>{{$product->product_name}}</td>
          <td>{{number_format($product->price)}}.vnđ</td>
          <td> <img src="{{asset('images/')}}/{{$product->product_image}}"  style="width: 100px; height: 100px"></td>
          <td>{{$product->Brand->name}}</td>
          <td>{{$product->Category->name}}</td>
          <td>{{$product->City->name}}</td>
          <td style="background-color: {{$product->Color->color}}"></td>
          <td>
            <a class="p-0 ml-2 btn-link btn float-left" 
            href="{{ route('products.edit',$product->id) }}">
              <i class="fas fa-edit text-warning"></i>
            </a>
            <button type="button" class="btn btn-white ml- deleteUser" data-toggle="modal" data-target="#exampleModalDelete" data-id="{{$product->id}}"><i class="fas fa-trash-alt text-danger"></i></button>
          </td>
        </tr>
  @endforeach
</tbody>  
</table>
</div>
</div>
</div>
</div>
 {{Form::open(['route' => 'productsDelete', 'method' => 'POST', 'class'=>'col-md-5'])}}
{{ method_field('DELETE') }}
{{ csrf_field() }}
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to Delete?
        <!-- Nhận giá trị của hàng được gắn -->
        <input type="hidden" name="id" id="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
    </div>
  </div>
</div> 
{{ Form::close() }}

<script type="text/javascript">
  $(document).on('click','.deleteUser',function(){
    var userID=$(this).attr('data-id');
    $('#id').val(userID);
  });
</script>

@endsection
@section('script')
@include('admin.shared.script')
@endsection