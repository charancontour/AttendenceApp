<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Employee;
// use App\Salary;
class EmployeeController extends Controller
{

	public function index()
	{
		$employees = Employee::all();
		return view('Employee.index')->with('employees',$employees);
	}

    public function create()
    {
    	return view('Employee.create');
    }

    public function store(StoreRequest $request)
    {      

       //dd($request);

		$employee=new Employee;
		$employee->name=$request->name;
		$employee->phonenumber=$request->phonenumber;
		$employee->email=$request->email;
		$employee->amount=$request->amount;
		$employee->address=$request->address;
		$employee->save();
		return redirect('employee');

	
    }

    public function edit($id)
    {

    	$employee=Employee::findOrFail($id);

    	return view('Employee.edit')->with('employee',$employee);
    }

    public function update(UpdateRequest $request)
    {    


    	
    	$id = $request->segment(3);
    	$employee = Employee::findOrFail($id);

    	$employee->name = $request->name;

		$employee->phonenumber = $request->phonenumber;
		$employee->email = $request->email;
		$employee->amount=$request->amount;
		$employee->address = $request->address;
		$employee->save();

		return redirect('employee');


    }

    public function delete(Request $request)
    {
    	$id =  $request->segment(3);
    	$employee =  Employee::findOrFail($id);

    	//dd($employee);
    	$employee->delete();

    	return redirect('employee');
    }
    

    // public function salary()
    // {  


    // 	$employees = Employee::all();
          

    //       return view('Employee.salary')->with('employees',$employees);

    // }
    // public function salary(SalaryRequest $request) 
    // {  

    //    $salary  =     new Salary;
    //    $salary->employee_id =  $request->employee_id;
    //    $salary->salary    =    $request->salary;
    //    $salary->save();

    // }

  
}
