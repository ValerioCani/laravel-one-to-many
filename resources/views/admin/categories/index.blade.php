@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td class="d-flex">
                            <a class="btn btn-info" href="{{route('admin.categories.show',['category'=>$category->id])}}">Visualizza</a>
                            <a class="btn btn-warning" href="">Modifica</a>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">!Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
