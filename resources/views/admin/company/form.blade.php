<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Company Unique ID</label>
    <input type="text" name="companyId" value="{{ $company->companyId != '' ? $company->companyId : old('companyId') }}" class="form-control @error('u_id') is-invalid @enderror" placeholder="Unique ID / Trade Licence">
    @error('companyId')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{ $company->name != '' ? $company->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Company Name">
    @error('name')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Description</label>
    <input type="text" name="description" value="{{ $company->description != '' ? $company->description : old('description') }}" class="form-control @error('description') is-invalid @enderror" placeholder="Company Description">
    @error('description')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Date launch</label>
    <input type="date" name="launch_date" value="{{ $company->launch_date != '' ? $company->launch_date : old('launch_date') }}" class="form-control @error('launch_date') is-invalid @enderror" placeholder="Born Date">
    @error('launch_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Available Departments</label>
    <select id="department" name="departments[]" multiple="multiple" class="form-control @error('departments') is-invalid @enderror">
        <option value="" disabled>Select departments</option>
        @foreach($departments as $id => $name)
            <option value="{{ $id }}" >{{ $name }}</option>
        @endforeach
    </select>
    @error('departments')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Phone</label>
    <input type="text" name="phone" value="{{ $company->phone != '' ? $company->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
    @error('phone')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Email</label>
    <input type="email" name="email" value="{{ $company->email != '' ? $company->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Unique Email">
    @error('email')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Address</label>
    <input type="text" name="address" value="{{ $company->address != '' ? $company->address : old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
    @error('address')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>