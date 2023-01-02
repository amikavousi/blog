@extends('PostApp::layouts/layout')
@section('content')
    @foreach($posts as $post)
        <article>
            <h1><a href="{{route('posts.single-post',$post)}}">{{$post->title}}</a> by <span style="color: darkred">{{$post->user->name}}</span></h1>
            <h3>{{$post->category->title}}</h3>
            <p>{{$post->description}}</p>
        </article>
    @endforeach
@endsection
