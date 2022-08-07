<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    private $rules = [
        'name' => ['required'],
        'email' => ['nullable', 'email'],
        'logo' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100']
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::cursorPaginate(10);

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

        if ($request->hasFile('logo')) {
            $fileName = now()->getTimestamp().'-'.$request->logo->getClientOriginalName();
            Storage::putFileAs('public', $request->logo, $fileName);
            $company->logo = $fileName;
        }

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

        if ($company->logo && Storage::exists('public/'.$company->log)) {
            Storage::delete('public/'.$company->logo);
        }

        $company->delete();

        return redirect()->intended('/');
    }
}
