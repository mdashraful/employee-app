<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Fiscal Year</label>
    <select id="fiscal_year" name="fiscal_year" class="form-control @error('fiscal_year') is-invalid @enderror">
        <option value="">Select Fiscal Year</option>
        @foreach($fiscalYears as $fiscalYear)
            <option start="{{ setFormatedDate($fiscalYear->start_date) }}" end="{{ setFormatedDate($fiscalYear->end_date) }}" value="{{ $fiscalYear->id }}" @selected(($leaveApplication->fiscal_year != '' ? $leaveApplication->fiscal_year : old('fiscal_year')) == $fiscalYear->id)>{{ $fiscalYear->name }}</option>
        @endforeach
    </select>
    @error('fiscal_year')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Leave Type</label>
    <select id="leave_category" name="leave_category" class="form-control @error('leave_category') is-invalid @enderror">
        <option value="">Select Leave Category</option>
        @foreach($leaveCategories as $id => $name)
            <option value="{{ $id }}" @selected(($leaveApplication->leave_category != '' ? $leaveApplication->leave_category : old('leave_category')) == $id)>{{ $name }}</option>
        @endforeach
    </select>
    @error('leave_category')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Leave From</label>
    <input type="text" id="leave_from" name="leave_from" value="{{ $leaveApplication->leave_from != '' ? getFormatedDate($leaveApplication->leave_from) : getFormatedDate(old('leave_from')) }}" 
        class="form-control @error('leave_from') is-invalid @enderror" placeholder="Start Date" autocomplete="off">
    @error('leave_from')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Leave To</label>
    <input type="text" id="leave_to" name="leave_to" value="{{ $leaveApplication->leave_to != '' ? getFormatedDate($leaveApplication->leave_to) : getFormatedDate(old('leave_to')) }}" 
        class="form-control @error('leave_to') is-invalid @enderror" placeholder="End Date" autocomplete="off">
    @error('leave_to')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-12 col-md-12 col-xl-12">
    <label for="">Leave Details</label>
    <textarea name="details" rows="12" placeholder="Details About Leave" class="form-control @error('details') is-invalid @enderror">
        {{ $leaveApplication->details ?? old('details') }}
    </textarea>
    @error('details')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Attachment: </label>
    @if($leaveApplication->attachment)
        <a href="{{ route('attachment.view', $leaveApplication->id) }}">{{ $leaveApplication->attachment }}</a>
    @endif
    <input type="file" name="attachment" class="form-control-file" accept="application/pdf">
    @error('attachment')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<input type="hidden" name="leave_applied_days" id="total_ld" value="{{ $leaveApplication->id != '' ? $leaveApplication->leave_applied_days : old('leave_applied_days') }}">

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                const leaveFromDf = "{{ $leaveApplication->id != '' ? $leaveApplication->leave_from : old('leave_from') }}";
                const leaveToDf = "{{ $leaveApplication->id != '' ? $leaveApplication->leave_to : old('leave_to') }}";
                
                var leaveFrom = $("#leave_from").flatpickr({
                    altInput: true,
                    altFormat: "d/m/Y",
                    dateFormat: "Y-m-d",
                    defaultDate: leaveFromDf
                });

                var leaveTo = $("#leave_to").flatpickr({
                    altInput: true,
                    altFormat: "d/m/Y",
                    dateFormat: "Y-m-d",
                    defaultDate: leaveToDf
                });

                $("#fiscal_year").on('change', function(){   
                    leaveFrom.clear();
                    leaveTo.clear();

                    let id = $(this).val();
                    let startFiscalYear = $("#fiscal_year option[value = "+ id +"]").attr("start");
                    let endFiscalYear = $("#fiscal_year option[value="+ id +"]").attr("end");
 
                    leaveFrom.set('minDate', startFiscalYear);
                    leaveFrom.set('maxDate', endFiscalYear);

                    leaveTo.set('minDate', startFiscalYear);
                    leaveTo.set('maxDate', endFiscalYear);
                    
                    $("#leave_from").on("change", function(){
                        var startDate = $("#leave_from").val();

                        leaveTo.set('minDate', startDate);
                        leaveTo.set('maxDate', endFiscalYear);
                    });

                    $("#leave_to").on("change", function(){
                        var endDate = $("#leave_to").val();

                        leaveFrom.set('minDate', startFiscalYear);
                        leaveFrom.set('maxDate', endDate);
                    });
                });

                // $("#fiscal_year").trigger('change') ;
                
                $("#leave_from").on("change", function(){
                    var startDate = $("#leave_from").val();
                    var endDate = $("#leave_to").val();

                    var days = daysdifference(startDate, endDate);   
                    
                    $("#total_ld").val(days + 1);
                }); 

                $("#leave_to").on("change", function(){
                    var startDate = $("#leave_from").val();
                    var endDate = $("#leave_to").val();

                    var days = daysdifference(startDate, endDate);   
                    
                    $("#total_ld").val(days + 1);
                }); 
                    
                function daysdifference(firstDate, secondDate){  
                    var startDay = new Date(firstDate);  
                    var endDay = new Date(secondDate);  
                
                    // Determine the time difference between two dates     
                    var millisBetween = startDay.getTime() - endDay.getTime();  
                
                    // Determine the number of days between two dates  
                    var days = millisBetween / (1000 * 3600 * 24);  
                
                    // Show the final number of days between dates     
                    return Math.round(Math.abs(days));  
                }
            });    
        })(jQuery);
    </script>
@endpush
                    

