@extends('admin.layout.master')
@push('css')
    <style>
        
    </style>
@endpush
@section('header')
    All Fiscal Year
@endsection

@section('tagline')
    List of Fiscal Years
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
            All Fiscal Year List
        </div>
    </div>
    <div class="card-body">
        <table class="table  bg-white table-sm striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th class="text-center">Actions</th>                       
                </tr>
            </thead>
            <tbody>
                @forelse($fiscal_years as $fiscal_year)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fiscal_year->name }}</td>
                        <td>{{ $fiscal_year->start_date }}</td>
                        <td>{{ $fiscal_year->end_date }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                            <a href="{{ route('fiscal_year.edit', $fiscal_year->id) }}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>
                            
                            <button class="btn btn-sm btn-danger delete_fy"><i class="ti-trash "></i> Delete</button>
                            <form action="{{route('fiscal_year.destroy', $fiscal_year->id)}}" id="delete_form" method="POST">
                                @method('delete')  
                                @csrf   
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Fiscal Year Found</td>
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