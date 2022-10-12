@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.categories.index')}}" class="btn btn-primary m-4">Torna alla lista</a>
        <h3>Name:</h3>
        <h5>{{$category->name}}</h5>
        <br>
        <h3>Slug:</h3>
        <h5>{{$category->slug}}</h5>
        <h3>Related Posts:</h3>
        <ol>
            @foreach ($category->posts as $post)
                <li>
                    <div class="d-flex form-control">
                        <h5>Id:</h5>
                        <h5>{{$post->id}}</h5>
                    </div>
                    <div class="d-flex form-control">
                        <h5>Title:</h5>
                        <h5>{{$post->title}}</h5>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
