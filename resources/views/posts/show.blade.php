@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card">

                    <div class="card-header">

                    <h1>{{$post->title}}</h1>
                        <small class="text-muted">Created at: <strong>{{$post->created_at}}</strong></small>
                        <br>
                        <small class="text-muted">Updated at: <strong>{{$post->updated_at}}</strong></small>
                    </div>

                    <div class="card-body">
                        <img src="{{$post->image}}" alt="" class="mb-3 img-thumbnail">
                        <p class="mt-0 mb-3">BY: <strong class="text-uppercase">{{$post->user_name}}</strong></p>

                        <p>{{$post->body}}</p>

                        @if(Auth::check())
                            @if(Auth::id() == $post->user_id)
                                <hr>
                                <a href="{{route('posts.edit', ['post'=>$post->id])}}" class="mb-2 form-control btn btn-primary">UPDATE POST</a>
                                <form method='POST' class=" form" action="{{route('posts.destroy', ['post'=>$post->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="form-control btn btn-danger">DELETE POST</button>
                                </form>
                            @endif
                        @endif


                    </div>

                </div>

                <h3 class="mt-3">Comments</h3>


            </div>
        </div>
    </div>
@endsection