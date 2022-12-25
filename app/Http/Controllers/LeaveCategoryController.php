<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategory;
use App\Models\FiscalYear;
use App\Http\Requests\StoreLeaveCategoryRequest;
use App\Http\Requests\UpdateLeaveCategoryRequest;

class LeaveCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveCategories = LeaveCategory::with('fiscalYear')->get();

        return view('admin.leave_category.index', compact('leaveCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiscalYears = FiscalYear::pluck('name', 'id');
        $fiscalYearArray = json_decode($fiscalYears);

        if(empty($fiscalYearArray)){
            return to_route('fiscal-year.create');
        }else{
            $leaveCategory = new LeaveCategory;

            return view('admin.leave_category.create', [
                'leaveCategory' => $leaveCategory,
                'fiscalYears' => $fiscalYears,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveCategoryRequest $request)
    {
        $validated = $request->validated();

        LeaveCategory::create($validated);

        return to_route('leave-category.index')->with('success', 'Leave Category Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveCategory  $leaveCategory
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveCategory $leaveCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveCategory  $leaveCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveCategory $leaveCategory)
    {
        $fiscalYears = FiscalYear::pluck('name', 'id');

        return view('admin.leave_category.edit', [
        'leaveCategory' => $leaveCategory,
        'fiscalYears' => $fiscalYears,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveCategoryRequest  $request
     * @param  \App\Models\LeaveCategory  $leaveCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveCategoryRequest $request, LeaveCategory $leaveCategory)
    {
        $validated = $request->validated();

        $leaveCategory->update($validated);

        return to_route('leave-category.index')->with('success', 'Leave Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveCategory  $leaveCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveCategory $leaveCategory)
    {
        try {
            $destroy = $leaveCategory->delete();
            return back()->with('success', 'Leave Category Deleted Successfully');
        } catch (\Throwable $e) {
            return back()->with('error', 'Can Not delete Parent');
        }
    }
}
