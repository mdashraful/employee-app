<?php

namespace App\Http\Controllers;

use App\Models\Fiscal_year;
use App\Http\Requests\StoreFiscal_yearRequest;
use App\Http\Requests\UpdateFiscal_yearRequest;

class Fiscal_yearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiscal_years = Fiscal_year::all();

        return view('admin.fiscal_year.index', compact('fiscal_years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiscal_year = new Fiscal_year;

        return view('admin.fiscal_year.create', compact('fiscal_year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFiscal_yearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFiscal_yearRequest $request)
    {
        $validated = $request->validated();

        Fiscal_year::create($validated);

        return to_route('fiscal_year.index')->with('success', 'Fiscal Year Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fiscal_year  $fiscal_year
     * @return \Illuminate\Http\Response
     */
    public function show(Fiscal_year $fiscal_year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fiscal_year  $fiscal_year
     * @return \Illuminate\Http\Response
     */
    public function edit(Fiscal_year $fiscal_year)
    {
        return view('admin.fiscal_year.edit', compact('fiscal_year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFiscal_yearRequest  $request
     * @param  \App\Models\Fiscal_year  $fiscal_year
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFiscal_yearRequest $request, Fiscal_year $fiscal_year)
    {
        $validated = $request->validated();

        $fiscal_year->update($validated);

        return back()->with('success', 'Fiscal Year Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fiscal_year  $fiscal_year
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fiscal_year $fiscal_year)
    {
        try {
            $destroy = $fiscal_year->delete();
            return back()->with('success', 'Fiscal Year Deleted Successfully');
        } catch (\Throwable $e) {
            return back()->with('error', 'Can Not delete Parent');
        }
    }
}
