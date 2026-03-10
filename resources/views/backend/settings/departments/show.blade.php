@extends('backend.layout.master')
@section('main_content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h4>Department Details</h4>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>Department Code:</strong>
                {{ $department->department_code }}
            </div>

            <div class="mb-3">
                <strong>Department Name:</strong>
                {{ $department->department_name }}
            </div>

            <div class="mb-3">
                <strong>Description:</strong>
                {{ $department->description }}
            </div>

            <div class="mb-3">
                <strong>Status:</strong>
                @if($department->status == 1)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </div>

            <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                Back
            </a>

            <a href="{{ route('departments.edit', $department->department_id) }}" class="btn btn-primary">
                Edit
            </a>

        </div>
    </div>
</div>
@endsection