@extends('admin.layout.master')
@push('css')
    <style>
        
    </style>
@endpush
@section('header')
    All Roles
@endsection

@section('tagline')
    List of Roles
@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <div class="card-title h5 m-0">
                All Roles List
            </div>
        </div>
        <div class="card-body">
            <table class="table  bg-white table-sm striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th class="text-center">Actions</th>                       
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }} </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                                <button class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="ti-trash "></i> Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No Roles Found</td>
                        <tr>    
                    @endforelse
                </tbody>
            </table>
@endsection