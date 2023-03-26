<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::latest('id')->get();

        return inertia('Companies/Index', compact('companies'));
    }

    public function create() {
        return inertia('Companies/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'      => 'required',
            'type'      => 'required',
            'address'   => 'required',
            'net_worth' => 'required'
        ]);

        Company::create([
            'name'      => $request->name,
            'type'      => $request->type,
            'address'   => $request->address,
            'net_worth' => $request->net_worth
        ]);

        return redirect('/companies')->with('Info', 'New company added');
    }

    public function edit(Company $company) {
        return inertia('Companies.Edit', [
            'company' => $company
        ]);
    }

    public function update(Request $request, Company $company) {
        $editField = $request->validate([
            'name'      => 'required',
            'type'      => 'required',
            'address'   => 'required',
            'net_worth' => 'required'
        ]);

        $company->update($editField);

        return redirect('/companies');
    }
}
