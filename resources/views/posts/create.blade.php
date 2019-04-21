@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <h3>Create New Post</h3>
                <hr>

                <form method="POST" action="{{route('posts.store')}}" class="form">



                    @csrf
                    <div class="form-group">

                        <label>Post Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control {{$errors->has('title')?'is-invalid':''}}">

                        @if($errors->has('title'))
                            <p style="margin-top:5px;font-size: .8em; font-weight: bolder; color:red">

                                {{$errors->first('title')}}

                            </p>
                        @endif


                    </div>

                    <div class="form-group">

                        <label>Image URL</label>
                        <textarea name="image" rows="2" class="form-control {{$errors->has('image') ? 'is-invalid': ''}}">{{old('image')}}</textarea>
                        @if($errors->has('image'))
                            <p style="margin-top:5px;font-size: .8em; font-weight: bolder; color:red">

                                {{$errors->first('image')}}

                            </p>
                        @endif
                    </div>

                    <div class="form-group">

                        <label>Post Body</label>
                        <textarea name="body" rows="5" class="form-control {{$errors->has('body')?'is-invalid':''}}">{{old('body')}}</textarea>

                        @if($errors->has('body'))
                            <p style="margin-top:5px;font-size: .8em; font-weight: bolder; color:red">

                                {{$errors->first('body')}}

                            </p>
                        @endif

                    </div>

                    <button class="btn btn-primary form-control">CREATE POST</button>
                </form>
                
            </div>

        </div>

    </div>

@endsection