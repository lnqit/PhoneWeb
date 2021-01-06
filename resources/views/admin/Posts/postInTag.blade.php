@extends('layouts.main')
@section('title','Danh sách post trong tag')

@section('content')
<div class="container">
    <h3>Cac post co cung tag:</h3>

    @foreach ($posts as $key => $posts)
        <div>
            <a href="{{ route('posts.show', $posts->id ) }}">
               <h4> {{ $posts->title }} </h4>
            </a>
            <p>{{ Str::limit($posts->content,250,'...') }}</p>
        </div>
    @endforeach
</div>

@endsection

@section('script')
@include('shared.script1')
@endsection
