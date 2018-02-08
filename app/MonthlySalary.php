<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlySalary extends Model
{
    protected $dates = ['month'];

    public function employee()
    {
      return $this->belongsTo('App\Employee');
    }
}
