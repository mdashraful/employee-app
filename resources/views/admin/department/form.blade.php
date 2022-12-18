<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{ $department->name != '' ? $department->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Department Name">
    @error('name')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Description</label>
    <input type="text" name="description" value="{{ $department->description != '' ? $department->description : old('description') }}" class="form-control @error('description') is-invalid @enderror" placeholder="Department Description">
    @error('description')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Official Available Designations</label>
    <select id="designation" name="designations[]" multiple="multiple" class="form-control @error('designations') is-invalid @enderror">
        <option value="" hidden>Select Designations</option>
        @foreach($designations as $id => $name)
            <option value="{{ $id }}" {{ (collect(old('designations'))->contains($id)) ? 'selected':'' }}>{{ $name }}</option>
        @endforeach
    </select>
    @error('designations')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

@push('js') 
    <script> 
        $(function($){
            $(document).ready(function(){   
                @if($department->id)         
                    @foreach($department->designations as $designation)
                        $('#designation option[value={{$designation}}]').attr('selected', '');
                    @endforeach
                @endif
            }); 
        })(jQuery);
    </script>
@endpush