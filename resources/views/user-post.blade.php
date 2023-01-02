<!doctype html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
@foreach($posts as $post)
    <article>
        <h1>{{$post->title}}</h1>
        <h2>by {{$post->author->name}} in {{$post->category->title}}</h2>
        <p>{{$post->description}}</p>
    </article>
@endforeach
</body>
</html>
