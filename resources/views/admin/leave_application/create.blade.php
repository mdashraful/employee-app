@extends('admin.layout.master')

@section('header')
    Add Leave Application
@endsection

@section('tagline')
    Create Leave Application
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Leave Application
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('leave-application.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @include('admin.leave_application.form')                    
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection