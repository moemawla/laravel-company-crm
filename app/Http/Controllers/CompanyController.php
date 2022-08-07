<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $rules = [
        'name' => ['required'],
        'email' => ['nullable', 'email'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        return redirect()->intended('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $company = Company::findOrFail($id);

        return view('companies.show')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $company = Company::findOrFail($id);

        $request->validate($this->rules);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        return redirect()->intended('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->intended('/');
    }
}
