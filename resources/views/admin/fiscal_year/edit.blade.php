@extends('admin.layout.master')

@section('header')
    Edit :{{ $fiscal_year->name }}
@endsection

@section('tagline')
    Edit Fiscal_year
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
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Edit Fiscal_year
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('fiscal_year.update', $fiscal_year->id)}}" method="POST">
                @csrf
                @method('PUT')
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