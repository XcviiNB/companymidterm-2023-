<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function index() {
        $members = Member::latest('id')->with('company')->get();

        return inertia('Members/Index', compact('members'));
    }

    public function create() {
        return inertia('Members/Create', [
            'members'   => Member::orderBy('last_name')->with('company')->get(),
            'companies' => Company::orderBy('name')->get()
        ]);
    }

    public function store(Request $request) {
        $field = $request->validate([
            'last_name'     => 'required',
            'first_name'    => 'required',
            'designation'   => 'required',
            'company_id'    => 'numeric|required'
        ]);

        Member::create($field);

        return redirect('/members');
    }

    public function edit(Member $member) {
        $companies = Company::orderBy('name')->get();

        return inertia('Members.Edit', [
            'members'    => $member,
            'companies'  => $companies
        ]);
    }

    public function update(Request $request, Member $member) {
        $editField = $request->validate([
            'last_name' =>  'required',
            'first_name' =>  'required',
            'designation' =>  'required',
            'company_id' =>  'required'
        ]);

        $member->update($editField);

        session()->flash('Info', 'Member details changed');

        return redirect('/members');
    }
}
