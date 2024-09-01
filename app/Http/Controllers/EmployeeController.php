<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show the profile of a specific employee
    public function profile($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.profile', compact('employee'));
    }

    // Show a specific employee
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }
}
