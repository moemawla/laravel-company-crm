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
            <div class="flex-col">
                <div class="flex justify-center py-4">
                    <form method="POST" action="/companies/{{ $company->id }}">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-center mb-4">
                            <h1 class="font-bold">Company Details Form</h1>
                        </div>
                        <br/>
                        <div class="flex justify-between">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" value="{{ $company->name }}" class="bg-gray-100 border ml-2">
                        </div>
                        <br/>
                        <div class="flex justify-between">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" value="{{$company->email }}" class="bg-gray-100 border ml-2">
                        </div>
                        <br/>
                        <div class="flex justify-between">
                            <label for="website">Website</label>
                            <input id="website" name="website" type="text" value="{{ $company->website }}" class="bg-gray-100 border ml-2">
                        </div>
                        <br/>
                        <div>
                            <button type="submit" class="bg-gray-400 border rounded-md px-2">Update</button>
                        </div>
                    </form>
                </div>
                <div class="my-4 ml-6">
                    <form method="POST" action="/companies/{{ $company->id }}">
                        @csrf
                        @method('DELETE')
                        <div>
                            <button type="submit" class="text-red-400">Delete Company</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection