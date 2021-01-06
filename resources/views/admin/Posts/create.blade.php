@extends('admin.layouts.layoutAdmin')
@section('title','Create Post')
@section('content')
 <div class="container-fluid mt-5">
  <div class="card shadow mb-4">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Create Post</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>'posts.store', 'method'=>'post']) !!}
            <div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">
                    {{Form::label('Title:')}}
                    {{Form::text('title', '',['class' => 'form-control',])}}
                    <span class="text-danger"> {{ $errors->first('title')}} </span>
            </div>
            <br>
            <div class="form-group {{ $errors->has('desc') ? 'has-error':'' }}">
                    {{Form::label('Description:')}}
                    {{Form::text('desc', '',['class' => 'form-control'])}}
                    <span class="text-danger"> {{ $errors->first('desc')}} </span>
            </div>

           
            <br>
            <div class="form-group {{ $errors->has('keywords') ? 'has-error':'' }}">
                    {{Form::label('keyword:')}}
                    {{Form::text('keywords', '',['class' => 'form-control',])}}
                    <span class="text-danger"> {{ $errors->first('keywords')}} </span>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error':'' }}">
                        {{Form::label('Status:')}}
                        {{Form::radio('status','0' ,True)}} Public
                        {{Form::radio('status','1' ,)}} Non-Public
                        <span class="text-danger"> {{ $errors->first('status')}} </span>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('tag_list') ? 'has-error':'' }}">
                    {{Form::label('Tag cho bài viết:')}}
                    {!!Form::select('tag[]',$tag, null,['class'=>'form-control tag','multiple'=>'multiple' ]) !!}
                    <span class="text-danger"> {{ $errors->first('tag')}} </span>
                </div>

            </div>
            <br>
            <div class="form-group {{ $errors->has('Content') ? 'has-error':'' }}">
                        {{Form::label('Content:')}}
                        <textarea name="content" id="ckeditor" cols="5" rows="5" class="form-control"></textarea> 
                        <span class="text-danger"> {{ $errors->first('content')}} </span>
            </div>

            <br>

            {{Form::submit('Create',["class"=> "btn btn-success"])}}
            <a href="{{ route('posts.index')}}" class="btn btn-primary">Back</a>

            {!! Form::close() !!}

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
            <script type="text/javascript">
                $('.tag').select2({

            });
            </script>
            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
            <script type="text/javascript">
                CKEDITOR.replace( 'ckeditor',{
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                } );
            </script>

            </div>
        </div>
    </div>
 </div>

@endsection
@section('script')
@include('admin.shared.script')
@endsection