<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of an employees.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $perPage = $request->get('perPage', 10);
        $data = Employee::query()->paginate($perPage);
        return response()->json($data);
    }

    /**
     * Display a listing of an employees by department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $department
     * @return \Illuminate\Http\Response
     */
    public function allByDepartment(Request $request, int $department)
    {
        $perPage = $request->get('perPage', 10);
        $data = Employee::query()->where('department_id', $department)->paginate($perPage);
        return response()->json($data);
    }
}
