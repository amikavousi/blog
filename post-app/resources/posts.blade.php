@extends('PostApp::layouts/layout')
@section('content')

    @include('PostApp::components/_header-home-page')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count() )
            <x-PostApp-single-post :post="$posts[0]"/>
            @if($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach($posts->skip(1) as $post)
                        <x-PostApp-post-card
                            :post="$post"
                            class="{{$loop->iteration <= 2 ? 'col-span-3' : 'col-span-2'}}"/>
                    @endforeach
                </div>
            @endif
        @endif
    </main>
    {{$posts->links()}}
@endsection
