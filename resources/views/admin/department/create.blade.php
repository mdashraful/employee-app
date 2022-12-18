@extends('admin.layout.master')

@section('header')
    Add Department
@endsection

@section('tagline')
    Create New Department
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Department
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('department.store')}}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.department.form')
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('js') 
    
@endpush