<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Department::all();
        return response()->json($data);
    }
}
