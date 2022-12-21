<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Fiscal_year;

class load_dataController extends Controller
{
    public function loadData(Request $request)
    {
        $loadType = $request->loadType;
        $id = $request->id;

        if($loadType == "department"){
            $departments = Department::where('company_id', $id)->pluck('name', 'id');
                        
            $str = "";
            foreach($departments as $id => $value){
                $str .= "<option value='$id'> $value </option>";
            }
        }else if($loadType == "designation"){

            $designations = Designation::where('company_id', $id)->pluck('name', 'id');
                        
            $str = "";
            foreach($designations as $id => $value){
                $str .= "<option value='$id'> $value </option>";
            }
        }

        return response()->json($str);
    }

    public function loadDate(Request $request)
    {
        $id = $request->id;
        $fiscal_year = Fiscal_year::select('start_date', 'end_date')->where('id', $id)->get();
        
        return response()->json($fiscal_year);
    }
}
