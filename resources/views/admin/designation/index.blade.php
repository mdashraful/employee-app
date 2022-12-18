@extends('admin.layout.master')
@push('css')
    <style>
        
    </style>
@endpush
@section('header')
    All Designation
@endsection

@section('tagline')
    List of Designations
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
            All Designation List
        </div>
    </div>
    <div class="card-body">
        <table class="table  bg-white table-sm striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Designation</th>
                    <th class="text-center">Level</th> 
                    <th class="text-center">Actions</th>                       
                </tr>
            </thead>
            <tbody>
                @forelse($designations as $designation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $designation->name }}</td>
                        <td class="text-center">{{ $designation->level }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                            <a href="{{ route('designation.edit', $designation->id) }}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>
                            
                            <button class="btn btn-sm btn-danger delete_des"><i class="ti-trash "></i> Delete</button>
                            <form action="{{route('designation.destroy', $designation->id)}}" id="delete_form" method="POST">
                                @method('delete')  
                                @csrf   
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No Designation Found</td>
                    <tr>    
                @endforelse
            </tbody>
        </table>
@endsection

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                $('.delete_des').on('click', function(){
                    if(confirm('Are you sure?')){
                        $(this).siblings('form').submit();
                    }
                    return false;
                });
            });
        })(jQuery);
    </script>
@endpush