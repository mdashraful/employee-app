@extends('admin.layout.master')

@section('header')
    Add Employee
@endsection

@section('tagline')
    Create New Employee
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Employee
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('employee.store')}}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.employee.form')
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection