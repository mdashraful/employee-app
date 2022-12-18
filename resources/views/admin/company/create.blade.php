@extends('admin.layout.master')

@section('header')
    Add Company
@endsection

@section('tagline')
    Create New Company
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 ">
                Add New Company
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('company.store')}}" method="POST">
                @csrf
                <div class="row">
                    @include('admin.company.form')
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection