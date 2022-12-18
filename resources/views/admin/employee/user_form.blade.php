<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">E.ID - Username</label>
    <input type="text" name="employeeId" value="{{ $employee->id != '' ? $employee->user->username : old('employeeId') }}" class="form-control @error('employeeId') is-invalid @enderror" placeholder="Employee Unique ID">
    @error('employeeId')
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