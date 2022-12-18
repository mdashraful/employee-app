@extends('admin.layout.master')

@section('header')
    Add Employee
@endsection

@section('tagline')
    Create New Employee
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Employee
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('employee.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Company</label>
                        <select id="company" name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                            <option value="" hidden>Select Company</option>
                        </select>
                        @error('company_id')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Department</label>
                        <select id="department" name="department_id" class="form-control @error('department_id') is-invalid @enderror">

                        </select>
                        @error('department_id')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Designation</label>
                        <select id="designation"  name="designation_id" class="form-control @error('designation_id') is-invalid @enderror">

                        </select>
                        @error('designation_id')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Employee Role</label>
                        <select id="role" name="role_id" class="form-control @error('role_id') is-invalid @enderror">

                        </select>
                        @error('role_id')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Unique ID</label>
                        <input type="text" name="unique_id" value="{{ old('unique_id') }}" class="form-control @error('u_id') is-invalid @enderror" placeholder="Employee Unique ID">
                        @error('unique_id')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Employee Name">
                        @error('name')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                        @error('username')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-xl-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="text-danger">{{ "* ".$message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                function loadOption(selectType, category_id){
                    let params = {
                        "_token" : "{{ csrf_token() }}",
                        "type" : selectType,
                        'category_id' : category_id,
                    }
                    $.ajax({
                        type : "POST",
                        url : "{{route('option')}}",
                        data : params,
                        success : function(res){
                            if(selectType == "company"){
                                $.each(res, function (key, value) {
                                    $('#company').append('<option value="' + value
                                        .id + '">' + value.name + '</option>');
                                });
                            }else if(selectType == "department"){
                                $("#department").html('<option value="" hidden>Select Department</option>');
                                $.each(res, function (key, value) {
                                    $('#department').append('<option value="' + value
                                        .id + '">' + value.name + '</option>');
                                });
                            }else if(selectType == "designation"){
                                $("#designation").html('<option value="" hidden>Select Designation</option>');
                                $.each(res, function (key, value) {
                                    $('#designation').append('<option value="' + value
                                        .id + '">' + value.name + '</option>');
                                });
                            }else if(selectType == "role"){
                                $("#role").html('<option value="" hidden>Select Employee Role</option>');
                                $.each(res, function (key, value) {
                                    $('#role').append('<option value="' + value
                                        .id + '">' + value.name + '</option>');
                                });
                            }
                        }
                    });
                }
                
                loadOption("company");

                $("#company").on('change', function(){
                    var $company_id = $("#company").val();
                    loadOption("department", $company_id);
                });

                $("#department").on('change', function(){
                    var $department_id = this.value;
                    loadOption("designation", $department_id);
                });

                loadOption("role");
            });
        })(jQuery);
    </script>
@endpush