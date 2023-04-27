<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            <a href="/" class="text-sm font-bold uppercase mr-4">Home Page</a>
            @if(auth()->check())
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="text-sm font-bold uppercase text-blue-500">Logout</button>
                </form>
            @else
                <a href="{{route('register.view')}}" class="text-sm font-bold uppercase text-blue-500 mr-3">Register</a>
                <a href="{{route('login.view')}}" class="text-sm font-bold uppercase text-blue-500">Login</a>
            @endif
            <a href="#subscribe"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="{{route('services.mailerlite.new-sub')}}" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input name="email" id="subscribe" type="text" placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>
@if(session()->has('success'))
    <div class="fixed bg-blue-400 text-white rounded-xl py-2 px-4 bottom-3 right-3 text-sm"
         x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
    >
        <p> {{session('success')}} </p>
    </div>
@endif
@if(session()->has('failed'))
    <div class="fixed bg-red-400 text-white rounded-xl py-2 px-4 bottom-3 right-3 text-sm"
         x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
    >
        <p> {{session('failed')}} </p>
    </div>
@endif
</body>
