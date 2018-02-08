<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonthlySalary;
use App\Employee;
class ReportController extends Controller
{
  public function index()
  {
		$monthly_salaries		=		MonthlySalary::all();
    return view('report.index')->with('monthly_salaries',$monthly_salaries);
  }

}
