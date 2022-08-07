<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $rules = [
        'first_name' => ['required'],
        'last_name' => ['required'],
        'company_id' => ['required', 'numeric', 'exists:companies,id'],
        'email' => ['nullable', 'email'],
        'phone' => ['nullable', 'numeric'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::cursorPaginate(10)->withPath('/employees');

        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();

        return view('employees.create')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->intended('/employees');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();

        return view('employees.show')
            ->with('employee', $employee)
            ->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate($this->rules);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->intended('/employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->intended('/employees');
    }
}
