<?php
namespace App\Repositories\Employee;
use App\Http\Requests\Employee\StoreRequest;

Interface  EmployeeInterface
{
   public function getAll();
   public function store(StoreRequest $request);

   
}








