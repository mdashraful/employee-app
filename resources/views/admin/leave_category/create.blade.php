@extends('admin.layout.master')

@section('header')
    Add Leave Category
@endsection

@section('tagline')
    Create Leave Category
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Leave Category
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('leave_category.store')}}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.leave_category.form')                    
                    <div class="form-group col-sm-6 col-md-4 col-xl-3 text-center mt-4">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection