<!doctype html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
@foreach($posts as $post)
    <article>
        <h1 style="color: white">{{$post->title}}</h1>
        <h2>by <a style="color: aqua" href="/author/{{$post->author->name}}">{{$post->author->name}}</a> in <a
                style="color: red" href="{{$post->category->slug}}">{{$post->category->title}}</a></h2>
        <p>{{$post->description}}</p>
    </article>
@endforeach
<a href="{{route('posts.all')}}">back</a>
</body>
</html>
