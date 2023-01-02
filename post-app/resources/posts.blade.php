@extends('PostApp::layouts/layout')
@section('content')
    @foreach($posts as $post)
        <article>
            <h1><a href="{{route('posts.single-post',$post)}}">{{$post->title}}</a> </h1>
            <h2>by <a style="color: aqua" href="author/{{$post->author->name}}">{{$post->author->name}}</a> in <a
                    style="color: red" href="category/{{$post->category->slug}}">{{$post->category->title}}</a></h2>
            <p>{{$post->description}}</p>
        </article>
    @endforeach
@endsection
