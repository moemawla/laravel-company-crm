@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="border rounded-md h-96 w-96">
            @if ($errors->any())
                <div class="flex justify-center py-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <div class="flex justify-center py-4">
                <form method="POST" action="/login">
                    @csrf
                    <div class="flex justify-center mb-4">
                        <h1 class="font-bold">Login Form</h1>
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="bg-gray-100 border border ml-2">
                    </div>
                    <br/>
                    <div>
                        <button type="submit" class="bg-gray-400 border rounded-md px-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection