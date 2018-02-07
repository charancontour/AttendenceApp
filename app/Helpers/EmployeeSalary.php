<?php namespace App\Helpers;

use App\Employee;
use App\Attendence;
use App\MonthlySalary;

class EmployeeSalary
{
  public static function calculateMonthlySalary($month_date)
  {
    $start_date_of_month = date('Y-m-01',strtotime($month_date));
    $end_date_of_month = date('Y-m-t',strtotime($month_date));

    $employees = Employee::with(['attendences' => function($q) use($start_date_of_month,$end_date_of_month){
      $q->where('date','<=',$end_date_of_month);
      $q->where('date','>=',$start_date_of_month);
    }])->get();

    $working_days = Attendence::where('date','<=',$end_date_of_month)
                              ->where('date','>=',$start_date_of_month)
                              ->where('workingday',1)
                              ->count();

    $monthly_salaries = MonthlySalary::where('month',$start_date_of_month)->get();

    foreach($employees as $employee){
      $employee_month_salary = $monthly_salaries->filter(function($item) use($employee){
        return $item->employee_id === $employee->id;
      })->first();

      if(!$employee_month_salary){
        $employee_month_salary = new MonthlySalary;
      }

      $employee_month_salary->month              = $start_date_of_month;
      $employee_month_salary->employee_id        = $employee->id;
      $employee_month_salary->present_days       = $employee->attendences->count();
      $employee_month_salary->total_working_days = $working_days;
      $employee_month_salary->basic_salary       = $employee->monthlysalary;
      $employee_month_salary->deduction          = $employee->monthlyreductions;
      $employee_month_salary->net_salary         = ($employee_month_salary->present_days * ($employee_month_salary->basic_salary/$employee_month_salary->total_working_days)) - $employee_month_salary->deduction;
      $employee_month_salary->save();
    }

    return true;
  }
}
