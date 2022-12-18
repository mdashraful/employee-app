@extends('admin.layout.master')
@push('css')
    <style>
        
    </style>
@endpush
@section('header')
    All Employee
@endsection

@section('tagline')
    List of Employees
@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <div class="card-title h5 m-0">
                All Employee List
            </div>
        </div>
        <div class="card-body">
            <table class="table  bg-white table-sm striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th class="text-center">Email</th>
                        <th>Company</th>
                        <th>Department</th> 
                        <th>Designation</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>                       
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }} </td>
                            <td>{{ $employee->unique_id }} </td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->company_id }}</td>
                            <td>{{ $employee->department_id }}</td>
                            <td>{{ $employee->designation_id }}</td>
                            <td>{{ $employee->role_id }}</td>
                            <td>{{ $employee->status }}</td>
                            <td class="text-start">
                                <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                                <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>

                                <button class="btn btn-sm btn-danger delete"><i class="ti-trash "></i> Delete</button>

                                <form action="{{route('employee.destroy', $employee->id)}}" id="delete_form" method="POST">
                                    @method('delete')  
                                    @csrf   
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">No employee Found</td>
                        <tr>    
                    @endforelse
                </tbody>
            </table>
@endsection

@push('js')
    <script>
        ;(function($){
            
            $(document).ready(function(){
                $(".delete").click(function(e){
                    if (confirm('Are you sure?')) {
                        $(this).siblings('form').submit();
                    }
                    return false;
                });
            });
        })(jQuery);
    </script>
@endpush