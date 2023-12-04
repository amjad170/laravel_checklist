<?php

namespace App\Http\Controllers;
use  App\Models\AssignDetails;
use  App\Models\Department;
use  App\Models\AssignMaster;
use  App\Models\Checklist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AssignDetailsController extends Controller
{
    //AssignMaster view 
    public function index(Request $request)
    {
        $Allchecklist = Checklist::latest()->get();
        $Alldatas = AssignDetails::latest()->get();
        $alldepartments = Department::latest()->get();
        $allassignMaster = AssignMaster::latest()->get();

        return view('assignDetails',compact('Alldatas','alldepartments','allassignMaster','Allchecklist'));
       
    }


    //AssignMaster  Store 
    public function  assignDetailsstore(Request $request)
    {

        if (isset($request['department'])) {

            for ($i = 0; $i < count($request['department']); $i++) {
                $assign_details = new AssignDetails();
                $assign_details->assignMasterID = $request['assignMasterID'][$i];
                $assign_details->departmentID = $request['department'][$i];
                $assign_details->chceKlistID = $request['checklistID'][$i];
 
                // $departments->remark = $request['remark'][$i];
                $assign_details->save();
            }


            return redirect()->route('AssignDetails.all');
        }
    }
}
