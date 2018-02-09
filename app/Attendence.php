<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
class Attendence extends Model
{
    //
   
    public function employees()
    {
         return $this->belongsToMany('App\Employee','employee_attendence');
    }
   
}
