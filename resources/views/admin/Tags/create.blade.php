<div class="col-md-12 ">
    <h3 class="col-md-12 text-center">Create Tag</h3>
    <!-- hiển thị thông điệp -->
	@if(Session::has('thongdiep'))
		<p> {{ Session::get('thongdiep') }} </p>
	@endif()
        {!! Form::open(['route'=>'tags.store', 'method'=>'post']) !!}
        <div class="form-group {{ $errors->has('tag_name') ? 'has-error':'' }}">
                {{Form::label('Tag name:','',['class' => 'col-md-3 float-left mt-2'])}}
                {{Form::text('tag_name', '',['class' => 'form-control col-md-9 float-left',])}}
                <span class="text-danger"> {{ $errors->first('tag_name')}} </span>
        </div>
        <br>

        <br>
        {{Form::submit('Create',["class"=> "btn btn-success"])}}
		
	{!! Form::close() !!}
</div>