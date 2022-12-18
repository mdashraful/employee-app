<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Fiscal Year</label>
    <select id="fiscal_year" name="fiscal_year" class="form-control @error('fiscal_year') is-invalid @enderror">
        <option value="" hidden>Select Fiscal Year</option>
        @foreach($fiscal_years as $id => $name)
            <option value="{{ $id }}" @selected(($leave_application->fiscal_year != '' ? $leave_application->fiscal_year : old('fiscal_year')) == $id)>{{ $name }}</option>
        @endforeach
    </select>
    @error('fiscal_year')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Leave Type</label>
    <select id="leave_type" name="leave_type" class="form-control @error('leave_type') is-invalid @enderror">
        <option value="" hidden>Select Leave Category</option>
        @foreach($leave_categories as $id => $name)
            <option value="{{ $id }}" @selected(($leave_application->leave_type != '' ? $leave_application->leave_type : old('leave_type')) == $id)>{{ $name }}</option>
        @endforeach
    </select>
    @error('leave_type')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Start Date</label>
    <input type="date" name="start_date" value="{{ $leave_application->start_date != '' ? $leave_application->start_date : old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror">
    @error('start_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">End Date</label>
    <input type="date" name="end_date" value="{{ $leave_application->end_date != '' ? $leave_application->end_date : old('end_date') }}" class="form-control @error('end_date') is-invalid @enderror">
    @error('end_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 col-md-12 col-xl-12">
    <label for="">Leave Details</label>
    <textarea name="details" rows="12" placeholder="Details About Leave" class="form-control @error('details') is-invalid @enderror">
        {{ $leave_application->details ?? old('details') }}
    </textarea>
    @error('details')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Attachment: </label>
    @if($leave_application->attachment)
    <a href="{{ route('attachment.view', $leave_application->id) }}">{{ $leave_application->attachment }}</a>
    @endif
    <input type="file" name="attachment" class="form-control-file" accept="application/pdf">
    @error('attachment')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>


