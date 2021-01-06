@extends('Admin.layouts.layoutAdmin')
@section('title','Edit Post')
@section('content')

<div class="container-fluid mt-5">
  <div class="card shadow mb-4">
    @if(Session::has('thongbao'))
      <p class="alert {{ Session::get('alert-class', 'alert-success') }} ">{{ Session::get('thongbao') }}</p>
    @endif
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold text-gray-dark">Edit POSTS</h3>
        </div>
        <div class="card-body">
            {!! Form::model($post,['route'=>['posts.update',$post->id], 'method'=>'put']) !!}
                <div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">
                        {{Form::label('Title:')}}
                        {{Form::text('title', $post->title,['class' => 'form-control',])}}
                        <span class="text-danger"> {{ $errors->first('title')}} </span>
                </div>
                <br>
                <div class="form-group {{ $errors->has('desc') ? 'has-error':'' }}">
                        {{Form::label('Description:')}}
                        {{ Form::textarea('desc',isset($post->seo->first()->desc) ? $post->seo->first()->desc : null ,['class'=>'form-control', 'rows' => '3', 'id' => 'demo']) }}
                        
                        <span class="text-danger"> {{ $errors->first('desc')}} </span>
                </div>
                <br>
                <div class="form-group {{ $errors->has('keyword') ? 'has-error':'' }}">
                        {{Form::label('keyword:')}}
                        {{Form::text('keyword', isset($post->seo->first()->keywords) ? $post->seo->first()->keywords : null,['class' => 'form-control',])}}
                        <span class="text-danger"> {{ $errors->first('keyword')}} </span>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error':'' }}">
                            {{Form::label('Status:')}}
                            {{Form::radio('status','0' ,$post->status)}} Public
                            {{Form::radio('status','1' ,$post->status)}} Non-Public
                            <span class="text-danger"> {{ $errors->first('status')}} </span>
                </div>
            <div class="col-md-12">
                    <div class="form-group {{ $errors->has('tag_list') ? 'has-error':'' }}">
                        {{Form::label('Tag for Post:')}}
                        {!!Form::select('tag[]',$tag,$post->tag_name ,['class'=>'form-control tag','multiple'=>'multiple' ]) !!}
                        <span class="text-danger"> {{ $errors->first('tag_list')}} </span>
                    </div>

            </div>
                <br>
                <div class="form-group {{ $errors->has('Content') ? 'has-error':'' }}">
                            {{Form::label('Content:')}}
                            
                            {{Form::textarea('content', $post->content,['class' => 'form-control','id'=>'ckeditor'])}}
                            <span class="text-danger"> {{ $errors->first('content')}} </span>
                </div>

                <br>

            {{Form::submit('Upload',["class"=> "btn btn-success"])}}
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


@endsection
@section('script')
@include('admin.shared.script')
@include('admin.shared.scriptModal')
@endsection