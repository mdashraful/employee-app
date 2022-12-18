@extends('admin.layout.master')

@section('header')
    Edit {{ $department->name }} Department
@endsection

@section('tagline')
    Edit Department Info.
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
                Edit Department
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('department.update', $department->id)}}" method="POST">
                @csrf
                @method('PUT')
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

