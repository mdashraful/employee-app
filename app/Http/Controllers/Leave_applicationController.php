<?php

namespace App\Http\Controllers;

use App\Models\Leave_application;
use App\Models\Leave_category;
use App\Models\Fiscal_year;
use App\Http\Requests\StoreLeave_applicationRequest;
use App\Http\Requests\UpdateLeave_applicationRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;

class Leave_applicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_applications = Leave_application::all();

        return view('admin.leave_application.index', compact('leave_applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiscal_years = Fiscal_year::all();
        $fiscal_yearsArray = json_decode($fiscal_years);

        $leave_categories = Leave_category::pluck('name', 'id');
        $leave_categoriesArray = json_decode($leave_categories);

        $leave_application = new Leave_application;

        if(empty($fiscal_yearsArray)){
            return to_route('fiscal_year.create');
        }else if(empty($leave_categoriesArray)){
            return to_route('leave_category.create');
        }else{
            return view('admin.leave_application.create', [
            'fiscal_years' => $fiscal_years,
            'leave_categories' => $leave_categories,
            'leave_application' => $leave_application,
        ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeave_applicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeave_applicationRequest $request)
    {
        $validated = $request->validated();
        dd($request->file('attachment'));
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
        Leave_application::create($validated);

        return to_route('leave_application.index')->with('success', 'Leave Application Submitted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave_application  $leave_application
     * @return \Illuminate\Http\Response
     */
    public function show(Leave_application $leave_application)
    {
        //
    }

    public function viewAttachment($id) 
    {
        $leave_application = Leave_application::find($id);

        return view('admin.leave_application.attachment_view', compact('leave_application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave_application  $leave_application
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave_application $leave_application)
    {
        $fiscal_years = Fiscal_year::all();
        $leave_categories = Leave_category::pluck('name', 'id');

        return view('admin.leave_application.edit', [
            'fiscal_years' => $fiscal_years,
            'leave_categories' => $leave_categories,
            'leave_application' => $leave_application,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeave_applicationRequest  $request
     * @param  \App\Models\Leave_application  $leave_application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave_application $leave_application)
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
        // dd($request->file('attachment'));
        if($request->file('attachment')){
            dd($request->file('attachment'));
            $path = public_path('upload/leave_attachments');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($leave_application->attachment){
                $attachment = $path.'/'.$leave_application->attachment;
                unlink($attachment);
            }

            $file = $request->file('attachment');
            $filename = uniqid().".".$file->extension();
            $file->move($path, $filename);
            $validated['attachment'] = $filename;
        }else{
            $validated['attachment'] = $leave_application->attachment;
        }

        $leave_application->update($validated);

        return back()->with('success', 'Leave Application Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave_application  $leave_application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave_application $leave_application)
    {
        $destroy = $leave_application->delete();

        if($leave_application->attachment && $destroy){
            $path = public_path('upload/leave_attachments');
            $attachment = $path.'/'.$leave_application->attachment;
            unlink($attachment);
        }
        return back()->with('success', 'Leave Application Deleted Successfully');
    }
}
