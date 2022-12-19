<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Company;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        
        return view('admin.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        $dataArray = json_decode($companies);

        if(empty($dataArray)){
            return redirect()->route('company.create');
        }else{
            $department = new Department;
            return view('admin.department.create', [
                'companies' => $companies,
                'department' => $department,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();

        Department::create($validated);

        return to_route('department.index')->with('success', 'Department Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {        
        $companies = Company::pluck('name', 'id');
        return view('admin.department.edit', [
            'department' => $department,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validated = $request->validated();

        $department->update($validated);

        return back()->with('success', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        try {
            $destroy = $department->delete();
            return back()->with('success', 'Department Deleted Successfully');
        } catch (\Throwable $e) {
            return back()->with('error', 'Can Not delete Parent');
        }
    }
}
