<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::paginate(5);
        return view('administrator.employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::get();
        return view(
            'administrator.employees.create',
            compact('companies')
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required',
            'company'       =>  'required'
        ]);

        $employees = Employee::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'company_id'       => $request->company
        ]);

        return redirect()->route(
            'employees.index'
        )->with('message', 'Success');
    }

    public function edit($id)
    {
        $companies = Company::get();
        $employee  = Employee::findOrFail($id);

        return view(
            'administrator.employees.edit',
            compact('companies', 'employee')
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required',
            'company'       =>  'required'
        ]);
        
        $companies = Employee::updateOrCreate([
            'id'        => $id
        ],[
            'name'      => $request->name,
            'email'     => $request->email,
            'company_id'       => $request->company
        ]);
        return redirect()->route(
            'employees.index'
        )->with('message', 'Updated Success');
    }

    public function destroy($id)
    {
        $company = Employee::findOrFail($id);
        $company->delete();

        return redirect()->route(
            'employees.index'
        )->with('message', 'Deleted Success');
    }
}
