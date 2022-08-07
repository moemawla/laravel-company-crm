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
                <form method="POST" action="/employees">
                    @csrf
                    <div class="flex justify-center mb-4">
                        <h1 class="font-bold">Add Employee Form</h1>
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="first_name">First Name</label>
                        <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" value="{{ old('email') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-between">
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="bg-gray-100 border ml-2">
                    </div>
                    <br/>
                    <div class="flex justify-start">
                        <label for="company_id">Company</label>
                        <select id="company_id" name="company_id" class="ml-5">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if (old('company') == $company->id) selected="selected" @endif >{{ $company->id }} - {{ $company->name }}</option>
                            @endforeach
                        </select>
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