@extends('admin.layout.master')

@section('content')
    <div class="row">
        <iframe src="{{ asset('/upload/leave_attachments/' .$leaveApplication->attachment) }}" title="description" frameborder="0" style="width:100%; min-height:640px;"></iframe>
    </div>
@endsection