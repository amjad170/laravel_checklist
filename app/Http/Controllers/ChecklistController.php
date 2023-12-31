<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checklist;
use Illuminate\Support\Facades\DB;


class ChecklistController extends Controller
{
    // index view
    public function index(Request $request)
    {
        $Alldatas = Checklist::latest()->get();
        return view('index', compact('Alldatas'));
    }


    // Store checklist
    public function  store(Request $request)
    {

        if (isset($request['description'])) {

            for ($i = 0; $i < count($request['description']); $i++) {
                $checklists = new Checklist();
                $checklists->description = $request['description'][$i];
                $checklists->remark = $request['remark'][$i];
                $checklists->save();
            }

            $Alldatas = Checklist::latest()->get();

            // return view('index',compact('Alldatas'));
            return redirect()->route('checklist.all')->with(compact('Alldatas'));
        }
    }


    // show edit form

    public function create()
    {
        $Alldatas = Checklist::latest()->get();
        return view('edit', compact('Alldatas'));
    }

    // delete checklist

    public function delete(string $id)
    {
        DB::table('checklists')->where('id', $id)->delete();
        return redirect()->route('checklist.editShow');
    }

    // Edit checklist

    // public function edit(string $id)
    // {
    //     $Alldatas = Checklist::latest()->get();
    //     $checklists = DB::table('checklists')->find($id);
    //     return view('edit', compact('checklists','Alldatas'));
    // }

    public function edit(string $id)
    {
        
        $checklists = DB::table('checklists')->find($id);
        return view('update', compact('checklists'));
    }

    

    // // Update checklist
         public function update(Request $request, string $id)
     {

        DB::table('checklists')->where('id',$id)->update([
                    "description" => $request->description,
                    "remark" => $request->remark
                ]);

        return redirect()->route('checklist.all');
     }






}
