<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Username (Employee ID)</label>
    <input type="text" name="username" value="{{ $employee->id != '' ? $employee->user->username : old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Unique Username">
    @error('username')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{ $employee->id != '' ? $employee->user->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Employee Name">
    @error('name')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Email</label>
    <input type="email" name="email" value="{{ $employee->id != '' ? $employee->user->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Unique Email">
    @error('email')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Password</label>
    <input type="password" name="password" value="{{ $employee->id != '' ? $employee->user->password : old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
    @error('password')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Company</label>
    <select id="company" name="company_id" class="company form-control @error('company_id') is-invalid @enderror">
        <option value="" >Select Company</option>
        @foreach ($companies as $company)
            <option value="{{ $company->id }}" @selected(($employee->company_id ?? old('company_id')) == $company->id)>
                {{ $company->name }}
            </option>
        @endforeach
    </select>
    @error('company_id')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>
@php 
    $dept_of_employees = DB::table('departments')
        ->where('id', $employee->department_id)
        ->get();
@endphp
<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Department</label>
    <select id="department" name="department_id" class="form-control @error('department_id') is-invalid @enderror">
        @foreach($dept_of_employees as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
        @if(old('department_id'))
            <option value="{{old('department_id')}}">{{ DB::table('departments')->find(old('department_id'))->name }}</option>
        @endif
    </select>
    @error('department_id')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>
@php 
    $designation_of_employee = DB::table('designations')
        ->find($employee->designation_id);
@endphp
<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Designation</label>
    <select id="designation"  name="designation_id" class="form-control @error('designation_id') is-invalid @enderror">
        @if($designation_of_employee)
            <option value="{{ $designation_of_employee->id }}">{{ $designation_of_employee->name }}</option>
        @elseif(old('designation_id'))
            <option value="{{old('designation_id')}}">{{ DB::table('designations')->find(old('designation_id'))->name }}</option>
        @endif
    </select>
    @error('designation_id')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Join Date</label>
    <input type="date" name="join_date" value="{{ $employee->join_date ?? old('join_date') }}" class="form-control @error('u_id') is-invalid @enderror" placeholder="Employee Unique ID">
    @error('join_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">NID</label>
    <input type="text" name="nid_no" value="{{ $employee->nid_no ?? old('nid_no') }}" class="form-control @error('name') is-invalid @enderror" placeholder="NID Card Number">
    @error('nid_no')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Phone</label>
    <input type="text" name="phone" value="{{ $employee->phone ?? old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number">
    @error('phone')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-check col-sm-6 col-md-4 col-xl-3 p-5">
    <input type="checkbox" name="role_id" value="2" class="form-check-input" @checked($employee->id != '' ? old('role_id', $employee->user->role_id == 2) : old('role_id'))>
    <label> Select As Admin</label>
    @error('role_id')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>
<div class=" col-sm-6 col-md-4 col-xl-3 p-5" id="data">
    
</div>
@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                @if(old('department_id'))      
                    alert(old('department_id'));  
                    
                @endif
                function loadOption(loadType, id){
                    $.ajax({
                        "url" : "{{route('loaddata')}}",
                        "type" : "POST",
                        "data" : {
                            "id": id,
                            "loadType": loadType,
                            "_token": "{{csrf_token()}}"
                        },
                        "success" : function(response){
                            if(loadType == "department"){
                                $("#department").html('<option value="" >Select Department</option>');
                                $("#department").append(response);
                            }else if(loadType == "designation"){
                                $("#designation").html('<option value="" >Select Designation</option>');
                                $("#designation").append(response);
                            }
                        }
                    });
                }

                $("#company").on('change', function(){
                    var company_id = $("#company").val();
                    if(company_id){
                        loadOption("department", company_id);
                        loadOption("designation", company_id);  
                    }else{
                        $("#department").empty();
                        $("#designation").empty();
                    }     
                });
            });
        })(jQuery);
    </script>
@endpush

