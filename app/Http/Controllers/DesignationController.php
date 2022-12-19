<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Company;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::all();

        return view('admin.designation.index', compact('designations'));
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
            $designation = new Designation;
            return view('admin.designation.create', [
                'companies' => $companies,
                'designation' => $designation,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDesignationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesignationRequest $request)
    {
        $validated = $request->validated();

        Designation::create($validated);

        return to_route('designation.index')->with('success', 'Designation Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        $companies = Company::pluck('name', 'id');

        return view('admin.designation.edit', [
            'companies' => $companies,
            'designation' => $designation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesignationRequest  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        $validated = $request->validated();

        $designation->update($validated);

        return back()->with('success', 'Designation Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        try {
            $destroy = $designation->delete();
            return back()->with('success', 'Designation Deleted Successfully');
        } catch (\Throwable $e) {
            return back()->with('error', 'Can Not delete Parent');
        }   
    }
}
