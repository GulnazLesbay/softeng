@extends('layouts.app')

@section('title','Product page' )
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">


                <a class="btn btn-success mb-3" href="{{ route('posts.create') }}">Create
                    post</a>
                @foreach($posts as $post )

                    <div class="card">
                        <div class="card-header p-3">
                            <a href="{{route('posts.show',$post->id)}}"><h5
                                    class="card-title"> {{$post->name}}</h5></a>

                        </div>
                        <div class="card-body">


                            <p class="card-text">{{$post->description}}</p>
                            <div class="d-flex " style="justify-content: flex-end;">

{{--                                <form action="{{route('posts.destroy',$post->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-danger" type="submit">delete</button>--}}
{{--                                </form>--}}
                            </div>

                        </div>
                    </div>

                    <p></p>

                @endforeach

            </div>
        </div>
    </div>

@endsection




