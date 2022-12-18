<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{$designation->name != '' ? $designation->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Designation Name">
    @error('name')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Level</label>
    <select name="level" class="form-control">
        <option value="" hidden>Select Level</option>
        @for($i=1; $i<=4; $i++)  
            <option value="{{$i}}" @selected(($designation->level != '' ? $designation->level : old('level')) == $i)>{{$i}}</option>
        @endfor
    </select>
    @error('level')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>