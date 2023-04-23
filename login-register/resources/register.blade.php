@extends('PostApp::layouts.layout')
@section('content')
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl uppercase">Register!</h1>
            <form method="POST" action="{{route('register.newUser')}}">
                @csrf
                <div>
                    <label class="block my-2 uppercase font-bold underline text-lg text-gray-700" for="name">
                        name
                    </label>
                    <input class="border border-gray-400 p-2 w-full required:border-red-300" type="text" name="name"
                           id="name" required value="{{old('name')}}">
                    <p class="text-red-500"> {{$errors->register->first('name')}} </p>

                </div>
                <div>
                    <label class="block my-2 uppercase font-bold underline text-lg text-gray-700" for="username">
                        username
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" required value="{{old('username')}}">
                    <p class="text-red-500"> {{$errors->register->first('username')}} </p>
                </div>
                <div>
                    <label class="block my-2 uppercase font-bold underline text-lg text-gray-700" for="email">
                        email
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" required value="{{old('email')}}">
                    <p class="text-red-500"> {{$errors->register->first('email')}} </p>
                </div>
                <div>
                    <label class="block mb-2 uppercase font-bold underline text-lg text-gray-700" for="password">
                        password
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                           required>
                    <p class="text-red-500"> {{$errors->register->first('password')}} </p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-3 mt-5 hover:bg-blue-500">
                        Submit
                    </button>
                </div>

            </form>
        </main>
    </section>
@endsection
