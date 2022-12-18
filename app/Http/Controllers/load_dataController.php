<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;

class load_dataController extends Controller
{
    public function loadData(Request $request)
    {
        $loadType = $request->loadType;
        $id = $request->id;

        if($loadType == "department"){
            $company = Company::find($id);
            $department_ids = $company->departments;
            
            $str = "";
            foreach($department_ids as $department_id){
                $str .= "<option value='$department_id'>".Department::find($department_id)->name."</option>";
            }
        }else if($loadType == "designation"){
            $department = Department::find($id);
            $designation_ids = $department->designations;
            
            $str = "";
            foreach($designation_ids as $designation_id){
                $str .= "<option value='$designation_id'>".Designation::find($designation_id)->name."</option>";
            }
        }
        

        return response()->json($str);
    }
}
