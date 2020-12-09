<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::paginate(5);
        return view('administrator.companies.index', compact('companies'));
    }

    public function create()
    {
        return view(
            'administrator.companies.create'
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required',
            'file'      =>  'required|max:2048|mimes:png|dimensions:min_width=100,min_height=100',
            'web'       =>  'required'
        ]);

        $fileName = date("Y_m_d_His") . "_" . uniqid() . "." . $request->file("file")->extension();
        $filePath = $request->file("file")->storeAs(
            "storage/app/company",
            $fileName,
            "public"
        );

        $companies = Company::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'logo'      => $filePath,
            'web'       => $request->web
        ]);

        return redirect()->route(
            'companies.index'
        )->with('message', 'Success');
    }

    public function edit($id)
    {
        $companies = Company::findOrFail($id);

        return view(
            'administrator.companies.edit',
            compact('companies')
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required',
            'web'       =>  'required'
        ]);
        
        if($request->file("file")){
            $this->validate($request, [
                'file'      =>  'required|max:2048|mimes:png|dimensions:min_width=100,min_height=100'
            ]);
            $fileName = date("Y_m_d_His") . "_" . uniqid() . "." . $request->file("file")->extension();
            $filePath = $request->file("file")->storeAs(
                "storage/app/company",
                $fileName,
                "public"
            );

            $company = Company::find($id);
            if($filePath){
                if (!preg_match("/^(\/)?seeds/i", $company->logo)) {
                    Storage::disk("public")->delete($company->logo);
                }
                $companies = Company::updateOrCreate([
                    'id'        => $id
                ],[
                    'logo'      => $filePath,
                ]);
            }    

        }

        $companies = Company::updateOrCreate([
            'id'        => $id
        ],[
            'name'      => $request->name,
            'email'     => $request->email,
            'web'       => $request->web
        ]);
        return redirect()->route(
            'companies.index'
        )->with('message', 'Updated Success');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        Storage::disk("public")->delete($company->logo);
        $company->delete();

        return redirect()->route(
            'companies.index'
        )->with('message', 'deleted Success');
    }
}
