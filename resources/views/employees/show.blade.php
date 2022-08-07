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
                    <form method="POST" action="/employees/{{ $employee->id }}">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-center mb-4">
                            <h1 class="font-bold">Employee Details Form</h1>
                        </div>
                        <br/>
                        <div class="flex justify-between">
                            <label for="first_name">First Name</label>
                            <input id="first_name" name="first_name" type="text" value="{{ $employee->first_name }}" class="bg-gray-100 border ml-2">
                        </div>
                        <br/>
                        <div class="flex justify-between">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" type="text" value="{{ $employee->last_name }}" class="bg-gray-100 border ml-2">
                        </div>
                        <br/>
                        <div class="flex justify-between">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" value="{{$employee->email }}" class="bg-gray-100 border ml-2">
                        </div>
                        <br/>
                        <div class="flex justify-between">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" type="text" value="{{ $employee->phone }}" class="bg-gray-100 border ml-2">
                        </div>
                        <br/>
                        <div class="flex justify-start">
                            <label for="company_id">Company</label>
                            <select id="company_id" name="company_id" class="ml-5">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ($employee->company_id == $company->id) selected="selected" @endif >{{ $company->id }} - {{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" class="bg-gray-400 border rounded-md px-2">Update</button>
                        </div>
                    </form>
                </div>
                <div class="my-4 ml-6">
                    <form method="POST" action="/employees/{{ $employee->id }}">
                        @csrf
                        @method('DELETE')
                        <div>
                            <button type="submit" class="text-red-400">Delete Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection