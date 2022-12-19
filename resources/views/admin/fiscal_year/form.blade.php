<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{ $fiscal_year->name != '' ? $fiscal_year->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Designation Name">
    @error('name')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Start Date</label>
    <input type="date" name="start_date" value="{{ $fiscal_year->start_date != '' ? $fiscal_year->start_date : old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror">
    @error('start_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">End Date</label>
    <input type="date" name="end_date" value="{{ $fiscal_year->end_date != '' ? $fiscal_year->end_date : old('end_date') }}" class="form-control @error('end_date') is-invalid @enderror">
    @error('end_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>
