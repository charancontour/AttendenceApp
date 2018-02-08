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
            //dd(date('Y-01-d'));

            // $months=["01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December"];

            //dd(date("F", '1994-01-12'));
            //dd(date("F", strtotime('2016-05-17 16:41:51'))); 
            //dd(date("F",strtotime('Y-m-d')));
            
    		return view('report.index')->with('monthlysalaries',$monthlysalaries)->with('employees',$employees)
                                                                                    ;

    }

}
