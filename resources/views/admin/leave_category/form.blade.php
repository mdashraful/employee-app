<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Fiscal Year</label>
    <select id="fiscal_year" name="fiscal_year_id" class="form-control @error('fiscal_year_id') is-invalid @enderror">
        <option value="" hidden>Select Fiscal Year</option>
        @foreach($fiscalYears as $id => $name)
            <option value="{{ $id }}" @selected(($leaveCategory->fiscal_year_id != '' ? $leaveCategory->fiscal_year_id : old('fiscal_year_id')) == $id)>{{ $name }}</option>
        @endforeach
    </select>
    @error('fiscal_year_id')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{ $leaveCategory->name != '' ? $leaveCategory->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Leave Name">
    @error('name')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Number Of Days</label>
    <input type="number" name="leave_days" min="0" value="{{ $leaveCategory->leave_days != '' ? $leaveCategory->leave_days : old('leave_days')}}" class="form-control @error('leave_days') is-invalid @enderror" placeholder="Total Days">
    @error('leave_days')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>


