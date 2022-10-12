@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.posts.index')}}" class="btn btn-primary m-4">Torna alla lista</a>

        <form action="{{route('admin.posts.update',['post'=>$post->id])}}" method="POST">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}">
                @error('title')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" cols="30" rows="3">{{old('content', $post->content)}}</textarea>
                @error('content')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control @error('category') is-invalid @enderror" name="category_id" id="category">

                    <option {{(old('category_id')=='')?'selected':''}} value="">Nessuna categoria</option>
                    @foreach ($categories as $category)
                        <option  value="{{$category->id}}" {{(old('category_id', $post->category_id)==$category->id)?'selected':''}}>{{$category->name}}</option>
                    @endforeach

                </select>
                 @error('category')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </form>

    </div>
@endsection
