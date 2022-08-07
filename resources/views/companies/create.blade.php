@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="border rounded-md min-h-96 w-96 px-2">
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
                <form method="POST" action="/companies" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center mb-4">
                        <h1 class="font-bold">Create Company Form</h1>
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="website">Website</label>
                        <input id="website" name="website" type="text" value="{{ old('website') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="logo">Logo</label>
                        <input id="logo" name="logo" type="file" class="bg-gray-100 border ml-2">
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