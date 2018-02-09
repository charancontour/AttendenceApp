<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendence;
use App\Employee;
use App\Http\Requests\Attendence\StoreRequest;
use App\Http\Requests\Attendence\UpdateRequest;
use App\Helpers\EmployeeSalary;

class AttendenceController extends Controller
{
	public function index()
	{
		$attendences     =       Attendence::with('employees')->get();
		return view('attendence.index')->with('attendences',$attendences);
	}


	public function create()
	{
		$employees      =       Employee::all();
		return view('attendence.create')->with('employees',$employees);
	}



  public function store(StoreRequest $request)
  {
   $attendence                 =     new Attendence;
   $attendence->date           =     $request->date;
   $attendence->workingday     =     $request->workingday;
   $attendence->save();

   $attendence->employees()->sync($request->employee_ids);

	 EmployeeSalary::calculateMonthlySalary($attendence->date);

    return redirect('/attendence');
  }


  public function edit($id)
  {
    $attendence	               =       Attendence::find($id);
    $employees	               =       Employee::with('attendences')->get();

    return view('attendence.edit')->with('employees',$employees)->with('attendence',$attendence);

  }


  public function update(UpdateRequest $request,$id)
  {
    $attendence                 =       Attendence::with('employees')->findOrFail($id);
    $attendence->date           =       $request->date;

    $attendence->save();
    $attendence->employees()->sync($request->employee_ids);
		EmployeeSalary::calculateMonthlySalary($attendence->date);
    return redirect('/attendence');
  }



  public function delete(Request $request, $id)
  {
      $attendence               =       Attendence::with('employees')->findOrFail($id);
      $attendence->employees()->detach($request->employee_ids);
      $attendence->delete();
      return redirect('/attendence');
  }

  public function display(Request $request)
  {
    if ($request->has('from_date')) {
        $from_date        =     $request->from_date;
    } else {
        $from_date        =     date('Y-m-01');
    }

    if ($request->has('to_date')) {
        $to_date          =     $request->to_date;
    } else {
        $to_date          =     date('Y-m-d');
    }

    if ($request->has('year') && $request->has('month')) {
      $from_date          =     $request->year . '-' . $request->month . '-01';
      $to_date            =     date('Y-m-t',strtotime($from_date));
    }

    $employees            =     Employee::with(['attendences'=> function($q) use($from_date,$to_date){
                                $q->where('date','>=',$from_date);
                                $q->where('date','<=',$to_date);
                                }])->get();

    $working_days         =       Attendence::where('workingday',1)->where('date','<=',$to_date)
                                              ->where('date','>=',$from_date)->count();
    
    return view('attendence.display')->with('employees',$employees)->with('working_days',$working_days) 
                                    ;
  }

  public function calender()
  {
    return view('attendence.calender');
  }



}
