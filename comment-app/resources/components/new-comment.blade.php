<div>
    <form method="POST" action="{{route('comment.new')}}" class="bg-gray-200 border border-gray-300 rounded-xl p-6 mb-6">
        @csrf

        <header class="flex items-center">
            <img class="rounded-full mr-2" src="https://i.pravatar.cc/60?u={{auth()->id()}}" width="40" height="40">
            <h2>want to leave comment?</h2>
        </header>
        <div class="mt-6">
            <input type="hidden" name="post_id" value="{{$postId}}">
            <textarea name="body" class="w-full text-sm focus: outline-none focus:ring" rows="8" placeholder="leave your comment ;)"></textarea>
        </div>
        <p class="text-red-500"> {{$errors->comment->first('body')}} </p>
        <div class="flex justify-end pt-6 border-t border-gray-200">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-6 hover:bg-blue-500">
                Post
            </button>
        </div>
    </form>
</div>
