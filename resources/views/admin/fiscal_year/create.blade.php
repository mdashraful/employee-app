@extends('admin.layout.master')

@section('header')
    Add Fiscal_year
@endsection

@section('tagline')
    Create New Fiscal_year
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Fiscal_year
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('fiscal_year.store')}}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.fiscal_year.form')                    
                    <div class="form-group col-sm-6 col-md-4 col-xl-3 text-center mt-4">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection