@extends('admin.layout.master')

@section('header')
    All Company
@endsection

@section('tagline')
    List of Companies
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
    @if (session('error'))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="card-title h5 m-0">
                All Company List
            </div>
        </div>
        <div class="card-body">
            <table class="table  bg-white table-sm striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Unque ID</th>
                        <th>Name</th>
                        <th class="text-center">Description</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Launched Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $company->companyId }}</td>
                            <td>{{ $company->name }} </td>
                            <td>{{ $company->description }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->launch_date }}</td>
                            <td class="text-start">
                                <button class="btn btn-sm btn-info"><i class="ti-eye"></i> View</button>
                                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm btn-secondary"><i class="ti-pencil"></i> Edit</a>
                                <button class="btn btn-sm btn-danger delete_com" id=""><i class="ti-trash "></i> Delete</button>
                                <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                    @csrf 
                                    @method('delete')
                                </form>                            
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="9">No Department Found</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
@endsection

@push('js')
    <script>
        ;(function($){
            $(document).ready(function(){
                $('.delete_com').on('click', function(){
                    if(confirm('Are you sure?')){
                        $(this).siblings('form').submit();
                    }
                    return false;
                });
            });
        })(jQuery);
    </script>
@endpush