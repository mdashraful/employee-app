@extends('admin.layout.master')
@push('css')

@endpush
@section('header')
    All Employee
@endsection

@section('tagline')
    List of Employees
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
                All Employee List
            </div>
        </div>
        <div class="card-body">
            <table class="table  bg-white table-sm striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>E.ID - Username</th>
                        <th class="text-center">Email</th>
                        <th>Company</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Join Date</th> 
                        <th>Satatus</th> 
                        <th class="text-center">Actions</th>                       
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->user->name }} </td>
                            <td>{{ $employee->user->username }} </td>
                            <td>{{ $employee->user->email }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>{{ $employee->designation->name }}</td>
                            <td>{{ $employee->join_date }}</td>
                            <td>{{ ucwords($employee->user->role->name) }}</td>
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