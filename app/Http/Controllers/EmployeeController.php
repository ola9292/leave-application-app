<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployees()
    {
        $employees = Employee::with('user')->get();

        return view('employee',[
            'employees' => $employees,
        ]);
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        // Redirect back with a success message
        return redirect()->route('holiday.employee')->with('success', 'Employee deleted successfully.');
    }
}
