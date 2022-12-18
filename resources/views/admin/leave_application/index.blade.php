@extends('admin.layout.master')
@push('css')
    <style>
        
    </style>
@endpush
@section('header')
    All Leave Application
@endsection

@section('tagline')
    List of Leave Application
@endsection

@section('content')
    @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
    @endif
<div class="card">
    <div class="card-header">
        <div class="card-title h5 m-0">
            All Leave Application List
        </div>
    </div>
    <div class="card-body">
        <table class="table  bg-white table-sm striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Applied By</th>
                    <th>Fiscal Year</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th class="text-center">Attachment</th>
                    <th class="text-center">Actions</th>                       
                </tr>
            </thead>
            <tbody>
                @forelse($leave_applications as $leave_application)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $leave_application->applied_by }}</td>
                        <td>{{ $leave_application->fiscalYear->name }}</td>
                        <td>{{ $leave_application->leaveType->name }}</td>
                        <td>{{ $leave_application->start_date }}</td>
                        <td>{{ $leave_application->end_date }}</td>
                        <td class="text-center">
                            @if($leave_application->attachment)
                                <a href="{{ route('attachment.view', $leave_application->id) }}">View</a>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                            <a href="{{ route('leave_application.edit', $leave_application->id) }}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>
                            
                            <button class="btn btn-sm btn-danger delete_la"><i class="ti-trash "></i> Delete</button>
                            <form action="{{ route('leave_application.destroy', $leave_application->id) }}" id="delete_form" method="POST">
                                @method('delete')  
                                @csrf   
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No Leave Application Found</td>
                    <tr>    
                @endforelse
            </tbody>
        </table>
@endsection

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                $('.delete_la').on('click', function(){
                    if(confirm('Are you sure?')){
                        $(this).siblings('form').submit();
                    }
                    return false;
                });
            });
        })(jQuery);
    </script>
@endpush