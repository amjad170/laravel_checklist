<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Department;

class DepartmentController extends Controller
{
    //depertment view 
    public function index(Request $request)
    {
        $Alldatas = Department::latest()->get();
        //  $Alldatas = Department::latest()->get();
        return view('department',compact('Alldatas'));
    }


    //  Store 
    public function  departmentstore(Request $request)
    {

        if (isset($request['department'])) {

            for ($i = 0; $i < count($request['department']); $i++) {
                $departments = new Department();
                $departments->depertmentName = $request['department'][$i];
                // $departments->remark = $request['remark'][$i];
                $departments->save();
            }


            return redirect()->route('department.all');
        }
    }
}
