<?php

namespace App\Http\Controllers;
use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Input;
class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	//get all the companies and display
    public function index()
    {
        $employes = Employee::paginate(10);
        return  view('Employee.index',compact('employes'));
    }
	
	public function search(Request $request)
    {
	$q = $request->q; 
 if($q != ""){
$company = Company::where('name', '=',$q )->paginate (5)->setPath ( '' );
if (count ( $company ) > 0)
{
 $users = Employee::where('company_id', '=', $company[0]->id  )->paginate (5)->setPath ( '' );
 $pagination = $users->appends ( array (
    'q' => Input::get( 'q' ) 
  ) );
 if (count ( $users ) > 0)
      return view('welcome',["users"=>$users]);
 }

 }
  return view('welcome')->with('message','No Details found. Try to search again !' );
	}
	
	
//redirect to add company
    public function create()
    {
        $campanies = Company::all();
        return  view('Employee.create',compact('campanies'));
    }
	
	
	//save data
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());
        return back()->with('successemployee', 'Employee Added');
      
    }
	
//redirect to update page
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $campanies = Company::all();
        return view('employee.edit',compact('employee','campanies'));
    }
	
//update company data
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $data = $request->validate([
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'company_id'        => 'required|integer',
            'email'             => 'nullable|email',
            'phone_number'      => 'nullable|numeric'
        ]);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->save();
        
        
        return redirect()->route('employes.index')->with('updatedemployee', 'Employee Updated');;
    }
	
	//delete data 
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employes.index');
    }
}
