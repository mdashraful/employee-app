<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $companiesArray = json_decode($companies);

        $departments = Department::pluck('id');
        $departmentsArray = json_decode($departments);

        $designations = Designation::pluck('id');
        $designationsArray = json_decode($designations);

        if(empty($companiesArray)){
            return redirect()->route('company.create');
        }else if(empty($departmentsArray)){
            return redirect()->route('department.create');
        }else if(empty($designationsArray)){
            return redirect()->route('designation.create');
        }else{
            $employee = new Employee;
            
            return view('admin.employee.create', [
                'employee' => $employee,
                'companies' => $companies,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->safe()->only('name', 'email', 'password', 'username', 'role_id');
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);     

        $validated = $request->safe()->except('name', 'email', 'password', 'username', 'role');

        $employee = Employee::create([
            'user_id' => $user['id'],
            "company_id" => $validated['company_id'],
            "department_id" => $validated['department_id'],
            "designation_id" => $validated['designation_id'],
            "join_date" => $validated['join_date'],
            "nid_no" => $validated['nid_no'],
            "phone" => $validated['phone'],
        ]);

        return redirect()->route('employee.index')->with('success', 'Employee Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        // $departments = Department::all();
        // $designations = Designation::all();
        // return $employee;
        return view('admin.employee.edit', 
        [
            'employee' => $employee,
            'companies' => $companies,
            // 'departments' => $departments,
            // 'designations' => $designations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // $validated = $request->validated();

        // $employee->update($validated);
        
        $validator = Validator::make($request->all(), [
            "username" => ['required',
                Rule::unique('users','username')->ignore($employee->user_id)],
            "name" => 'required',
            "email" => 'required|email|unique:users,email,' .$employee->user_id,
            'role_id' => 'nullable',
            'password' => 'nullable',
            "company_id" => 'required',
            "department_id" => 'required',
            "designation_id" => 'required',
            "join_date" => 'required|date',
            "nid_no" => 'required',
            "phone" => 'required|unique:employees,phone,' .$employee->id,
        ]);

        $validated = $validator->safe()->only('name', 'email', 'password', 'username', 'role_id');
        // dd($validated);
        
        if(! isset($validated['role_id'])){
            $validated['role_id'] = 1;
        }

        $user = User::find($employee->user_id); 

        if($request->password != ''){
            $validated['password'] = bcrypt($validated['password']);
            $user->update($validated);
        }else{
            $user->nama = $validated['name'];
            $user->email = $validated['email'];
            $user->username = $validated['username'];
            $user->role_id = $validated['role_id'];
        }

        

        $validated = $validator->safe()->except('name', 'email', 'password', 'username', 'role_id');

        $employee->update($validated);
        
        return to_route('employee.index')->with('success', 'Employee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $user = User::find($employee->user_id);
            $employee->delete();
            $user->delete();
            return back()->with('success', 'Employee Deleted Successfully');
        } catch (\Throwable $e) {
            return back()->with('error', 'Can Not delete Parent');
        }
    }
}
