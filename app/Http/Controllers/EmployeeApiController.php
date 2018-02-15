<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Employee\EmployeeInterface;

class EmployeeApiController extends Controller
{
    private $_employee;

    public function __construct(EmployeeInterface $employee)
    {
      $this->_employee = $employee;
    }

    public function index()
    {
      return $this->_employee->getAll();
    }

    public function store(Request $request)
    {
      $input = $request->all();

      dd($input);
      // return $this->_employee->store($request);
    }
}
