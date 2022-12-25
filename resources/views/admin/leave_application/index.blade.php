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
        <table id="datatable" class="table  bg-white table-sm striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Applied By</th>
                    <th>Fiscal Year</th>
                    <th>Leave Type</th>
                    <th>Leave From</th>
                    <th class="text-center">Applied Days</th>
                    <th>Leave To</th>
                    <th class="text-center">Attachment</th>
                    <th class="text-center">Actions</th>                       
                </tr>
            </thead>
            <tbody>
                @forelse($leaveApplications as $leaveApplication)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $leaveApplication->applied_by }}</td>
                        <td>{{ $leaveApplication->fiscalYear->name }}</td>
                        <td>{{ $leaveApplication->leaveCategory->name }}</td>
                        <td>{{ getFormatedDate($leaveApplication->leave_from) }}</td>
                        <td class="text-center">{{ $leaveApplication->leave_applied_days }}</td>
                        <td>{{ getFormatedDate($leaveApplication->leave_to) }}</td>
                        <td class="text-center">
                            @if($leaveApplication->attachment)
                                <a href="{{ route('attachment.view', $leaveApplication->id) }}">View</a>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary" onclick="window.location='{{ route('leave-application.pdf', $leaveApplication->id) }}'"><i class="fa-thin fa-file-pdf"></i> PDF</button>
                            <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                            <a href="{{ route('leave-application.edit', $leaveApplication->id) }}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>
                            
                            <button class="btn btn-sm btn-danger delete_la"><i class="ti-trash "></i> Delete</button>
                            <form action="{{ route('leave-application.destroy', $leaveApplication->id) }}" id="delete_form" method="POST">
                                @method('delete')  
                                @csrf   
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No Leave Application Found</td>
                    <tr>    
                @endforelse
            </tbody>
        </table>

        {{ $leaveApplications->links() }}
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