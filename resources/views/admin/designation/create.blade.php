@extends('admin.layout.master')

@section('header')
    Add Designation
@endsection

@section('tagline')
    Create New Designation
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Designation
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('designation.store')}}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.designation.form')                    
                    <div class="form-group col-sm-6 col-md-4 col-xl-3 text-center mt-4">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection