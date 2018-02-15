<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attendence;
class Employee extends Model
{
    //
    public function attendences()

    {
        return $this->belongsToMany('App\Attendence','employee_attendence');

    }
   
}
    
