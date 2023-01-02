@extends('PostApp::layouts/layout')
@section('content')
    <article style="border-top: #a0aec0 solid 2px; margin-top: 50px">
        <h1>{{$post->title}}</h1>
        <h2>{{$post->category->title}} by {{$post->author->name}}</h2>
        <h3>{{$post->description}}</h3>
    </article>
@endsection
