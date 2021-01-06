@extends('Admin.layouts.layoutAdmin')
@section('title','Tags List')
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
      <h3 class="m-0 font-weight-bold text-gray-dark">Tags List</h3>
    </div>

    <div style="margin-top:2%">
        {{ Form::open(['route' => ['tags.index' ],'method' => 'get']) }}
          <form class="form-inline text-right">
            <div class="form-group mb-2 col-8" style="float: left;">
              <input type="text" name="seachname" class="form-control" id="inputPassword2" placeholder="Search...">
            </div>
            <button type="submit" name="Seach" style="float: left;" class="btn btn-primary mb-2">Search</button>
          </form>
        {{ Form::close() }}
      </div>


    <div class="card-body">
      <div class="table-responsive">
        <div class="col-md-6 float-left">
        @include('Admin.Tags.create')
        </div>
        <div class="col-md-6 float-left">
            @include('Admin.Tags.list')
        </div>
    
      </div>
    </div>
  </div>
</div>

{{Form::open(['route' => 'tagsDelete', 'method' => 'POST', 'class'=>'col-md-5'])}}
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