@extends('admin.layout.master')
@push('css')

@endpush
@section('header')
    All Department
@endsection

@section('tagline')
    List of Departments
@endsection

@section('content')
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
            All department List
        </div>
    </div>
    <div class="card-body">
        <table class="table  bg-white table-sm striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Department Name</th>
                    <th class="text-center">Description</th>
                    <th>Company</th> 
                    <th class="text-center">Actions</th>                       
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $department)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $department->name }} </td>
                        <td>{{ $department->description }}</td>
                        <td>{{ $department->company->name }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                            <a href="{{route('department.edit', $department->id)}}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>

                            <button class="btn btn-sm btn-danger delete_dep"><i class="ti-trash "></i> Delete</button>
                            <form action="{{route('department.destroy', $department->id)}}" id="delete_form" method="POST">
                                @method('delete')  
                                @csrf   
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Department Found</td>
                    <tr>    
                @endforelse
            </tbody>
        </table>
@endsection

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                $('.delete_dep').on('click', function(){
                    if(confirm('Are you sure?')){
                        $(this).siblings('form').submit();
                    }
                    return false;
                });
            });
        })(jQuery);
    </script>
@endpush