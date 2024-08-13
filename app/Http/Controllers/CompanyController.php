<?php

namespace App\Http\Controllers;

use App\Models\Company; //import this
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //import this for password hashing

class CompanyController extends Controller
{
    //here create all crud logic
    public function loadAllCompanies(){
        $all_companies = Company::all();
        return view('companies',compact('all_companies'));
    }
    public function loadAllCompanies_2(){
        $all_companies = Company::all();
        return view('add-product',compact('all_companies'));
    }
    public function loadAddCompanyForm(){
        return view('add-company');
    }

    public function AddCompany(Request $request){
        // perform form validation here
        $request->validate([
            'name' => 'required|string',
            'size' => 'required',
            'city' => 'required',
        ]);
        try {
             // register company here
            $new_company = new Company;
            $new_company->name = $request->name;
            $new_company->size = $request->size;
            $new_company->city = $request->city;
            $new_company->save();

            return redirect('/companies')->with('success','Company Added Successfully');
        } catch (\Exception $e) {
            return redirect('/add/company')->with('fail',$e->getMessage());
        }
       
        
    }

    public function EditCompany(Request $request){
        // perform form validation here
        $request->validate([
            'name' => 'required|string',
            'size' => 'required',
            'city' => 'required',
        ]);
        try {
             // update company here
            $update_company = Company::where('id',$request->id)->update([
                'name' => $request->name,
                'size' => $request->size,
                'city' => $request->city,
            ]);

            return redirect('/companies')->with('success','Company Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/company')->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $company = Company::find($id);

        return view('/edit-company',compact('company'));
    }

    public function deleteCompany($id){
        try {
            Company::where('id',$id)->delete();
            return redirect('/companies')->with('success','Company Deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/companies')->with('fail',$e->getMessage());
            
        }
    }
}
