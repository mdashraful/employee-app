<?php

namespace App\Http\Controllers;

use App\Models\FiscalYear;
use App\Http\Requests\StoreFiscalYearRequest;
use App\Http\Requests\UpdateFiscalYearRequest;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiscalYears = FiscalYear::all();

        return view('admin.fiscal_year.index', compact('fiscalYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiscalYear = new FiscalYear;

        return view('admin.fiscal_year.create', compact('fiscalYear'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFiscalYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFiscalYearRequest $request)
    {
        $validated = $request->validated();

        FiscalYear::create($validated);

        return to_route('fiscal-year.index')->with('success', 'Fiscal Year Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function show(FiscalYear $fiscalYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function edit(FiscalYear $fiscalYear)
    {
        return view('admin.fiscal_year.edit', compact('fiscalYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFiscalYearRequest  $request
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFiscalYearRequest $request, FiscalYear $fiscalYear)
    {
        $validated = $request->validated();

        $fiscalYear->update($validated);

        return to_route('fiscal-year.index')->with('success', 'Fiscal Year Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiscalYear $fiscalYear)
    {
        try {
            $destroy = $fiscalYear->delete();
            return back()->with('success', 'Fiscal Year Deleted Successfully');
        } catch (\Throwable $e) {
            return back()->with('error', 'Can Not delete Parent');
        }
    }
}
