<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonthlySalary;
use App\Employee;
class ReportController extends Controller
{
    //
    public function index()
    {
        
    		$monthlysalaries		=		MonthlySalary::all();

    		//dd($monthlysalaries);
    		$employees=Employee::all();

    		//dd($employees);
    		
            
    		return view('report.index')->with('monthlysalaries',$monthlysalaries)->with('employees',$employees);



    }

}
