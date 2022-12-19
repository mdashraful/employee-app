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

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Companies</label>
    <select id="company" name="company_id" class="form-control @error('company_id') is-invalid @enderror">
        <option value="" hidden>Select Company</option>
        @foreach($companies as $id => $name)
            <option value="{{ $id }}" @selected(old('company_id') == $id) >{{ $name }}</option>
        @endforeach
    </select>
    @error('company_id')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

@push('js') 
    <script> 
        ;(function($){
            $(document).ready(function(){
                $('select[name=company_id]').val("{{$designation->company_id}}");
            });
        })(jQuery);
    </script>
@endpush