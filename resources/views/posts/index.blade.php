@extends('layouts.app')
@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach($posts as $post)
                    <div class="card" >

                        <div class="card-header">
                            <h4 class="mb-0 text-center"><strong>{{$post->title}}</strong></h4>
                            <p class="text-center mt-0 mb-0">
                                <small class="text-muted">{{$post->created_at}}</small>
                            </p>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{$post->image}}" alt="" class="img-thumbnail mb-3">
                            <p class="text-center mt-0 mb-3">BY: <strong class="text-uppercase">{{$post->user_name}}</strong></p>
                            <p class="text-center index-body">{{$post->body}}</p>
                                <a href="{{route('posts.show', ['post'=>$post->id])}}" class="form-control btn btn-primary">
                                    @if(Auth::check())
                                        @if($post->user_id == Auth::id())
                                            EDIT POST
                                        @else
                                            SHOW POST
                                        @endif
                                    @else
                                        SHOW POST
                                    @endif
                                </a>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>

            {{$posts->links()}}

        </div>
    </div>

    <script>

        let index_bodies = document.querySelectorAll('.index-body');
        index_bodies.forEach((index_body)=>{
            index_body.innerText = index_body.innerText.substr(0, 150)+' ...';
        })

    </script>
@endsection