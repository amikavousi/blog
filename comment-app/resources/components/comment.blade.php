@foreach($comments as $comment)
<article class="flex bg-gray-100 border border-gray-300 rounded-xl  p-6 mb-4">
    <div class="mr-3">
        <img class="rounded-xl border " src="https://i.pravatar.cc/100?u={{$comment->author->id}}" width="70" height="70">
    </div>
    <div>
        <header>
            <div class="mb-2">
                <h3 class="font-bold"> {{ $comment->author->name }} </h3>
                <p class="text-sm">
                    Posted
                    <time> {{$comment->created_at->diffForHumans()}} </time>
                </p>
            </div>
        </header>
        <p class="text-l">
            {{$comment->body}}
        </p>
    </div>
</article>
@endforeach
