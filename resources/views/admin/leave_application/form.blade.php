<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Fiscal Year</label>
    <select id="fiscal_year" name="fiscal_year" class="form-control @error('fiscal_year') is-invalid @enderror">
        <option value="">Select Fiscal Year</option>
        @foreach($fiscal_years as $fiscal_year)
            <option start="{{ setFormatedDate($fiscal_year->start_date) }}" end="{{ setFormatedDate($fiscal_year->end_date) }}" value="{{ $fiscal_year->id }}" @selected(($leave_application->fiscal_year != '' ? $leave_application->fiscal_year : old('fiscal_year')) == $fiscal_year->id)>{{ $fiscal_year->name }}</option>
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
        @foreach($leave_categories as $id => $name)
            <option value="{{ $id }}" @selected(($leave_application->leave_category != '' ? $leave_application->leave_category : old('leave_category')) == $id)>{{ $name }}</option>
        @endforeach
    </select>
    @error('leave_category')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Leave From</label>
    <input type="text" id="leave_from" name="leave_from" value="{{ $leave_application->leave_from != '' ? getFormatedDate($leave_application->leave_from) : old('leave_from') }}" 
        class="form-control @error('leave_from') is-invalid @enderror" placeholder="Start Date" autocomplete="off" readonly>
    @error('leave_from')
        <div class="text-danger">{{ "* ".$message }}</div>
    @enderror
</div>

<div class="form-group col-sm-6 col-md-4 col-xl-3">
    <label for="">Leave To</label>
    <input type="text" id="leave_to" name="leave_to" value="{{ $leave_application->leave_to != '' ? getFormatedDate($leave_application->leave_to) : old('leave_to') }}" 
        class="form-control @error('leave_to') is-invalid @enderror" placeholder="End Date" autocomplete="off" readonly>
    @error('leave_to')
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

<input type="hidden" name="leave_applied_days" id="total_ld" value="{{ $leave_application->id != '' ? $leave_application->leave_applied_days : '' }}">

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                $("#fiscal_year").on('change', function(){
                    var fiscal_year = $("#fiscal_year").val();
                    
                    var startFiscalYear = $("#fiscal_year option[value= "+ fiscal_year +"]").attr('start');
                    var endFiscalYear = $("#fiscal_year option[value=" + fiscal_year + "]").attr('end');
                    
                    $("#leave_from").flatpickr({
                        altInput: true,
                        altFormat: "d/m/Y",
                        dateFormat: "Y-m-d",
                        enable: [{
                            from: startFiscalYear,
                            to: endFiscalYear,
                        }],
                    });
                    $("#leave_to").flatpickr({
                        altInput: true,
                        altFormat: "d/m/Y",
                        dateFormat: "Y-m-d",
                        enable: [{
                            from: startFiscalYear,
                            to: endFiscalYear,
                        }],
                    });
                });

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

