@extends('admin.layout.master')

@section('header')
    Edit Leave Application
@endsection

@section('tagline')
    Edit Leave Application
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
                Edit Leave Application
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('leave_application.update', $leave_application->id)}}" method="POST">
                @csrf
                @method('PUT')
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