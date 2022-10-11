@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.posts.index')}}" class="btn btn-primary m-4">Torna alla lista</a>
        <h3>Title:</h3>
        <h5>{{$post->title}}</h5>
        <br>
        <h3>Content:</h3>
        <h5>{{$post->content}}</h5>
        <br>
        <h3>Slug:</h3>
        <h5>{{$post->slug}}</h5>
    </div>
@endsection
