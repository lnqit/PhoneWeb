@extends('Admin.layouts.layoutAdmin')
@section('title','Posts List')
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
      <h3 class="m-0 font-weight-bold text-gray-dark">Posts List</h3>
    </div>
    <div class="card-body">
      <a class="btn btn-success" href="{{route('posts.create')}}">Add New</a>

      <div style="margin-top:2%">
            {{ Form::open(['route' => ['posts.index' ],'method' => 'get']) }}
              <form class="form-inline text-right">
                <div class="form-group mb-2 col-8" style="float: left;">
                  <input type="text" name="seachname" class="form-control" id="inputPassword2" placeholder="Search...">
                </div>
                <button type="submit" name="Seach" style="float: left;" class="btn btn-primary mb-2">Search</button>
              </form>
            {{ Form::close() }}
          </div>

      <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
          <tr>
            <th>STT</th>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($post_info as $key => $post)
         <tr>
          <td > {{++$key}} </td>
          <td> {{$post->title}} </td>
          <td> <img  src=""> {!! Str::limit($post->content,100,'...')!!}</td>
          <!-- <td> {{ Str::limit($post->content),250,'...' }} </td> -->
          <td> {{$post->status}} </td>
          
          <td class=" text-center">
            <a class="p-0 ml-2 btn-link btn " 
               href="{{ route('posts.edit',$post->id) }}">
               <i class="fas fa-edit text-warning"></i>
            </a> 
            
           <button type="button" class="btn btn-white ml- deleteUser" data-toggle="modal" data-target="#exampleModalDelete" data-id="{{$post->id}}"><i class="fas fa-trash-alt text-danger"></i></button>
        
          </td>
        </tr>
        @endforeach
        </tbody>  
       </table>
       
      </div>
    </div>
  </div>
</div>

{{Form::open(['route' => 'postsDelete', 'method' => 'POST', 'class'=>'col-md-5'])}}
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
@include('admin.shared.scriptModal')
@endsection