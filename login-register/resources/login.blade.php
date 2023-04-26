@extends('PostApp::layouts.layout')
@section('content')
    <section class="px-6 py-6">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl uppercase">Login!</h1>
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div>
                    <label class="block my-2 uppercase font-bold underline text-lg text-gray-700" for="emailOrUsername">
                        email or username
                    </label>
                    <input class="border border-gray-400 p-2 w-full mb-2" type="text" name="emailOrUsername"
                           id="emailOrUsername" required value="{{old('emailOrUsername')}}">
                    <p class="text-red-500"> {{$errors->login->first('emailOrUsername')}} </p>
                </div>
                <div>
                    <label class="block mb-2 uppercase font-bold underline text-lg text-gray-700" for="password">
                        password
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                           required>
                    <p class="text-red-500"> {{$errors->login->first('password')}} </p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-3 mt-5 hover:bg-blue-500">
                        Login
                    </button>
                </div>
            </form>
            <p class="text-sm font-bold text-blue-600"><a href="{{route('register.view')}}">Didn't have an account?
                    Click Here!</a></p>
        </main>
    </section>
@endsection
