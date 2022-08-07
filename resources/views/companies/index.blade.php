@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        @if ($companies->isEmpty())
            <div class="border rounded-md text-center">
                <div class="p-2">
                    <h1>There are no companies created yet</h1>
                    <br/>
                    <a href="/companies/create" class="text-blue-400 hover:text-blue-600">Create a new company</a>
                </div>
            </div>
        @else
            <div class="flex justify-center text-center">
                <div>
                <table class="border-collapse border border-slate-400">
                    <thead>
                        <tr>
                            <td class="border border-slate-400 px-1">ID</td>
                            <td class="border border-slate-400 px-1">Name</td>
                            <td class="border border-slate-400 px-1">Email</td>
                            <td class="border border-slate-400 px-1">Website</td>
                            <td class="border border-slate-400 px-1">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td class="border border-slate-400 px-1">{{ $company->id }}</li></td>
                                <td class="border border-slate-400 px-1">{{ $company->name }}</td>
                                <td class="border border-slate-400 px-1">{{ $company->email }}</td>
                                <td class="border border-slate-400 px-1">{{ $company->website }}</td>
                                <td class="border border-slate-400 px-1">
                                    <a href="/companies/{{ $company->id }}" class="text-blue-400 hover:text-blue-600">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br/>
                <a href="/companies/create" class="text-blue-400 hover:text-blue-600">Create a new company</a>
                </div>
            </div>
        @endif
    </div>
@endsection