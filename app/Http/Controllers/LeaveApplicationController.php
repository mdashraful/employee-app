<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\FiscalYear;
use App\Models\LeaveCategory;
use App\Http\Requests\StoreLeaveApplicationRequest;
use App\Http\Requests\UpdateLeaveApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveApplications = LeaveApplication::all();

        return view('admin.leave_application.index', compact('leaveApplications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiscalYears = FiscalYear::all();
        $fiscalYearsArray = json_decode($fiscalYears);

        $leaveCategories = LeaveCategory::pluck('name', 'id');
        $leaveCategoriesArray = json_decode($leaveCategories);

        $leaveApplication = new LeaveApplication;

        if(empty($fiscalYearsArray)){
            return to_route('fiscal-year.create');
        }else if(empty($leaveCategoriesArray)){
            return to_route('leave-category.create');
        }else{
            return view('admin.leave_application.create', [
            'fiscalYears' => $fiscalYears,
            'leaveCategories' => $leaveCategories,
            'leaveApplication' => $leaveApplication,
        ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveApplicationRequest $request)
    {
        $validated = $request->validated();
        
        if($request->file('attachment')){
            $path = public_path('upload/leave_attachments');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $file = $request->file('attachment');
            $filename = uniqid().".".$file->extension();
            $file->move($path, $filename);
            $validated['attachment'] = $filename;
        }
        // dd($validated);
        LeaveApplication::create($validated);

        return to_route('leave-application.index')->with('success', 'Leave Application Submitted Successfully!');
    }

    /** 
     * view Attachment
    */

    public function viewAttachment($id) 
    {
        $leaveApplication = LeaveApplication::find($id);

        return view('admin.leave_application.attachment_view', compact('leaveApplication'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveApplication $leaveApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveApplication $leaveApplication)
    {
        $fiscalYears = FiscalYear::all();
        $leaveCategories = LeaveCategory::pluck('name', 'id');

        return view('admin.leave_application.edit', [
            'fiscalYears' => $fiscalYears,
            'leaveCategories' => $leaveCategories,
            'leaveApplication' => $leaveApplication,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveApplicationRequest  $request
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveApplication $leaveApplication)
    {
        $request['leave_from'] = setFormatedDate($request->leave_from);
        $request['leave_to'] = setFormatedDate($request->leave_to);
        
        $validated = $request->validate([
            'fiscal_year' => 'required',
            'leave_category' => 'required',
            'leave_from' => 'required|date|before:leave_to',
            'leave_to' => 'required|date|after:leave_from',
            'leave_applied_days' => 'required',
            'details' => 'required',
            'attachment' => 'nullable',
        ]);

        if($request->hasFile('attachment')){
            $path = public_path('upload/leave_attachments');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($leaveApplication->attachment){
                $attachment = $path.'/'.$leaveApplication->attachment;
                unlink($attachment);
            }

            $file = $request->file('attachment');
            $filename = uniqid().".".$file->extension();
            $file->move($path, $filename);
            $validated['attachment'] = $filename;
        }else{
            $validated['attachment'] = $leaveApplication->attachment;
        }

        $leaveApplication->update($validated);

        return to_route('leave-application.index')->with('success', 'Leave Application Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveApplication $leaveApplication)
    {
        $destroy = $leaveApplication->delete();

        if($leaveApplication->attachment && $destroy){
            $path = public_path('upload/leave_attachments');
            $attachment = $path.'/'.$leaveApplication->attachment;
            unlink($attachment);
        }
        return back()->with('success', 'Leave Application Deleted Successfully');
    }
}
