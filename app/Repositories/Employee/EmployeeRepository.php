<?php
namespace App\Repositories\Employee;
use App\Http\Requests\Employee\StoreRequest;

use App\Employee;


class EmployeeRepository implements EmployeeInterface
{
   public function getAll()
   {

   	$employee = Employee::all();
   	return $employee;
   }

   public function store(StoreRequest $request)
   { 
   	$employee 						 =	 new Employee;
    $employee->name                  =   $request->name;
    $employee->phone_number          =   $request->phone_number;
    $employee->email                 =   $request->email;
    $employee->monthly_salary        =   $request->monthly_salary;
    $employee->address               =   $request->address;
    $employee->monthly_reductions    =   $request->monthly_reductions; 

    return $employee->save();

   }

}

