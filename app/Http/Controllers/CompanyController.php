<?php

namespace App\Http\Controllers;

use App\Company;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile    ;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
	//get all the companies and display
    public function index()
    {
        $campanies = Company::paginate(10);
      return  view('Company.index',compact('campanies'));
    }
	
		//redirect to add company
    public function create()
    {
        return  view('Company.create');
    }
	
	//save image into storage
    public function store(CompanyRequest $request)
    {

        $formInput=$request->except('logo');

        $image=$request->logo;
       // dd($image);
        if($image)
        {
            /* in PUBLIC FOLDER*/ 

           // $random = rand(0, 999999);
          //  $imageName=$image->getClientOriginalName();
          //  $image->move('images',$random . "_" .  date("d-m-Y") ."_".$imageName);
          // $img = Image::make($image->getRealPath());

             /* in STORAGE FOLDER*/ 
          $formInput['logo']=Storage::disk('local')->put('nitin', $image);
        }

        Company::create($formInput);
		
        return back()->with('successcompany', 'Company Added');
    }
 	//redirect to update page with company data
	public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('Company.edit',compact('company'));
    }

	
	//update company data
    public function update(Request $request, $id)
    {
        $companyEdit = Company::find($id);

        $image=$request->logo;
    if($image){
       // $file = request()->file('logo');
      // dd($image);
       Storage::delete($companyEdit->logo);
       $companyEdit->logo = Storage::disk('local')->put('public', $image);
        
        
    } 
    $companyEdit->name = $request->name;
    $companyEdit->email = $request->email;
    $companyEdit->website = $request->website;
    $companyEdit->save();
    return redirect()->route('companies.index')->with('updatedcompany', 'Company Updated');
    }

	//delete data 
    public function destroy(Company  $company)
    {
        Storage::delete($company->logo);
        $company->delete();
        return redirect()->route('companies.index');
    }
}
