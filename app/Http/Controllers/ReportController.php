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
    	$employees              =       Employee::all();
            
    	return view('report.index')->with('monthlysalaries',$monthlysalaries)->with('employees',$employees)
                                                                                    ;

    }

}
