<?php

namespace App\Http\Controllers;

use App\Models\AssignMaster;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AssignMasterController extends Controller
{
    //AssignMaster view 
    public function index(Request $request)
    {
        $Alldatas = AssignMaster::latest()->get();
        $Alldepartment = Department::latest()->get();
        //  $Alldatas = Department::latest()->get();
        return view('assignMaster',compact('Alldatas','Alldepartment'));
    }


    //  Store 
    public function  assignMasterstore(Request $request)
    {

        if (isset($request['departmentID'])) {

            for ($i = 0; $i < count($request['departmentID']); $i++) {
                $assign_masters = new AssignMaster();
                $assign_masters->departmentID = $request['departmentID'][$i];
                // $departments->remark = $request['remark'][$i];
                $assign_masters->save();
            }


            return redirect()->route('assignMaster.all');
        }
    }


}
