@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        @if ($employees->isEmpty())
            <div class="border rounded-md text-center">
                <div class="p-2">
                    <h1>There are no employees created yet</h1>
                    <br/>
                    <a href="/employees/create" class="text-blue-400 hover:text-blue-600">Add a new employee</a>
                </div>
            </div>
        @else
            <div class="flex justify-center text-center">
                <div>
                    <h1 class="font-bold">Employees List</h1>
                    <br/>
                    <table class="border-collapse border border-slate-400">
                        <thead>
                            <tr>
                                <td class="border border-slate-400 px-1">ID</td>
                                <td class="border border-slate-400 px-1">First Name</td>
                                <td class="border border-slate-400 px-1">Last Name</td>
                                <td class="border border-slate-400 px-1">Email</td>
                                <td class="border border-slate-400 px-1">Phone</td>
                                <td class="border border-slate-400 px-1">Company ID</td>
                                <td class="border border-slate-400 px-1">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="border border-slate-400 px-1">{{ $employee->id }}</li></td>
                                    <td class="border border-slate-400 px-1">{{ $employee->first_name }}</td>
                                    <td class="border border-slate-400 px-1">{{ $employee->last_name }}</td>
                                    <td class="border border-slate-400 px-1">{{ $employee->email }}</td>
                                    <td class="border border-slate-400 px-1">{{ $employee->phone }}</td>
                                    <td class="border border-slate-400 px-1">{{ $employee->company_id }}</td>
                                    <td class="border border-slate-400 px-1">
                                        <a href="/employees/{{ $employee->id }}" class="text-blue-400 hover:text-blue-600">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br/>
                    <a href="/employees/create" class="text-blue-400 hover:text-blue-600">Add a new employee</a>
                </div>
            </div>
        @endif
    </div>
@endsection