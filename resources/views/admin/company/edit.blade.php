@extends('admin.layout.master')

@section('header')
    Edit Company : {{$company->name}} 
@endsection

@section('tagline')
    Edit Company Info
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
                Edit Company
            </div>
        </div>
        
        <div class="card-body">
            <form action="{{route('company.update', $company->id)}}" method="POST">
                @csrf
                @method('PUT')
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

@push('js') 
    <script> 
        
    </script>
@endpush