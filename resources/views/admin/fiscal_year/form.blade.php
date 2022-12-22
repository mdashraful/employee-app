<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{ $fiscalYear->name != '' ? $fiscalYear->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Fiscal year name">
    @error('name')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Start Date</label>
    <input type="text" id="start_date" name="start_date" placeholder="Start fiscal year" value="{{ $fiscalYear->id != '' ? $fiscalYear->start_date : old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror">
    @error('start_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">End Date</label>
    <input type="text" readonly id="end_date" name="end_date" placeholder="End fiscal year" value="{{ $fiscalYear->id != '' ? $fiscalYear->end_date : old('end_date') }}" class="form-control @error('end_date') is-invalid @enderror">
    @error('end_date')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                $("#start_date").flatpickr({
                    altInput: true,
                    altFormat: "d/m/Y",
                    dateFormat: "Y-m-d",
                });  
                $("#start_date").change(function(){
                    function leapyear(year)
                    {
                    return (year % 100 === 0) ? (year % 400 === 0) : (year % 4 === 0);
                    }
                    var start_date = $("#start_date").val();
                    let year =  new Date(start_date).getFullYear();
                    if(leapyear(year)){
                        $("#end_date").flatpickr({
                            altInput: true,
                            altFormat: "d/m/Y",
                            dateFormat: "Y-m-d",
                            defaultDate: new Date(start_date).fp_incr(365),
                        });
                    }else{
                        $("#end_date").flatpickr({
                            altInput: true,
                            altFormat: "d/m/Y",
                            dateFormat: "Y-m-d",
                            defaultDate: new Date(start_date).fp_incr(364),
                        });
                    }    
                });      
            });
        })(jQuery);    
    </script>
@endpush
