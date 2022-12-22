@extends('admin.layout.master')
@push('css')
    <style>
        
    </style>
@endpush
@section('header')
    All Leave Category
@endsection

@section('tagline')
    List of Leave Category
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
            All Leave Category List
        </div>
    </div>
    <div class="card-body">
        <table class="table  bg-white table-sm striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Fiscal Year</th>
                    <th>Leave Name</th>
                    <th>Days</th>
                    <th class="text-center">Actions</th>                       
                </tr>
            </thead>
            <tbody>
                @forelse($leaveCategories as $leaveCategoy)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $leaveCategoy->fiscalYear->name }}</td>
                        <td>{{ $leaveCategoy->name }}</td>
                        <td>{{ $leaveCategoy->leave_days }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                            <a href="{{ route('leave-category.edit', $leaveCategoy->id) }}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>
                            
                            <button class="btn btn-sm btn-danger delete_fy"><i class="ti-trash "></i> Delete</button>
                            <form action="{{route('leave-category.destroy', $leaveCategoy->id)}}" id="delete_form" method="POST">
                                @method('delete')  
                                @csrf   
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Leave Category Found</td>
                    <tr>    
                @endforelse
            </tbody>
        </table>
@endsection

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                $('.delete_fy').on('click', function(){
                    if(confirm('Are you sure?')){
                        $(this).siblings('form').submit();
                    }
                    return false;
                });
            });
        })(jQuery);
    </script>
@endpush