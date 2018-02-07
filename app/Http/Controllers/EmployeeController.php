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

        $employee                        =   new Employee;
        $employee->name                  =   $request->name;
        $employee->phonenumber           =   $request->phonenumber;
        $employee->email                 =   $request->email;
        $employee->monthlysalary         =   $request->monthlysalary;
        $employee->address               =   $request->address;
        $employee->monthlyreductions     =   $request->monthlyreductions; 
        $employee->save();
        
        return redirect('employee');
  }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('Employee.details')->with('employee',$employee);
    }

  public function edit($id)
  {
    $employee=Employee::findOrFail($id);
    return view('Employee.edit')->with('employee',$employee);
  }

    public function update(UpdateRequest $request,$id)
    {
        $employee                       =  Employee::findOrFail($id);
        $employee->name                 =  $request->name;
        $employee->phonenumber          =  $request->phonenumber;
        $employee->email                =  $request->email;
        $employee->monthlysalary        =  $request->monthlysalary;
        $employee->address              =  $request->address;
        $employee->monthlyreductions    =  $request->monthlyreductions; 
        $employee->save();

        return redirect('employee');
    }

  public function delete(Request $request,$id)
  {
    $employee =  Employee::findOrFail($id);
    $employee->delete();
    return redirect('employee');
  }

	

}
