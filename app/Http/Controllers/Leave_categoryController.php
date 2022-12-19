<?php

namespace App\Http\Controllers;

use App\Models\Leave_category;
use App\Models\Fiscal_year;
use App\Http\Requests\StoreLeave_categoryRequest;
use App\Http\Requests\UpdateLeave_categoryRequest;

class Leave_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_categories = Leave_category::all();

        return view('admin.leave_category.index', compact('leave_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiscal_years = Fiscal_year::pluck('name', 'id');
        $fiscal_yearsArray = json_decode($fiscal_years);

        if(empty($fiscal_yearsArray)){
            return to_route('fiscal_year.create');
        }else if(empty($leave_categoriesArray)){
            return to_route('leave_category.create');
        }else{
            $leave_category = new Leave_category;

            return view('admin.leave_category.create', [
                'leave_category' => $leave_category,
                'fiscal_years' => $fiscal_years,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeave_categoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeave_categoryRequest $request)
    {
        $validated = $request->validated();

        Leave_category::create($validated);

        return to_route('leave_category.index')->with('success', 'Leave Category Created Successfully!');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave_category  $leave_category
     * @return \Illuminate\Http\Response
     */
    public function show(Leave_category $leave_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave_category  $leave_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave_category $leave_category)
    {
        $fiscal_years = Fiscal_year::pluck('name', 'id');

        return view('admin.leave_category.edit', [
        'leave_category' => $leave_category,
        'fiscal_years' => $fiscal_years,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeave_categoryRequest  $request
     * @param  \App\Models\Leave_category  $leave_category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeave_categoryRequest $request, Leave_category $leave_category)
    {
        $validated = $request->validated();

        $leave_category->update($validated);

        return back()->with('success', 'Leave Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave_category  $leave_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave_category $leave_category)
    {
        try {
            $destroy = $leave_category->delete();
            return back()->with('success', 'Leave Category Deleted Successfully');
        } catch (\Throwable $e) {
            return back()->with('error', 'Can Not delete Parent');
        }
    }
}
