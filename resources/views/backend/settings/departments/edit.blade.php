@extends('backend.layout.master')

@section('main_content')

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1 class="m-0">Edit Department</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ route('departments.index') }}">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </li>
            <li class="breadcrumb-item active">
              Edit Department
            </li>
          </ol>
        </div>

      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-12">
          <div class="card card-primary">

            <div class="card-header">
              <h3 class="card-title">Update Form</h3>
            </div>

            <form action="{{ route('departments.update', $department->department_id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="card-body">

                {{-- Department Code --}}
                <div class="form-group">
                  <label>Department Code</label>
                  <input type="text"
                         class="form-control"
                         name="department_code"
                         value="{{ old('department_code', $department->department_code) }}">
                </div>

                {{-- Department Name --}}
                <div class="form-group">
                  <label>Department Name</label>
                  <input type="text"
                         class="form-control"
                         name="department_name"
                         value="{{ old('department_name', $department->department_name) }}">
                </div>

                {{-- Description --}}
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="decription"
                            class="form-control"
                            rows="3">{{ old('decription', $department->decription) }}</textarea>
                </div>

                {{-- Status --}}
                <div class="form-group">
                  <label>Status</label>

                  <div class="form-check">
                    <input class="form-check-input"
                           type="radio"
                           name="status"
                           value="active"
                           {{ $department->status == 'active' ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input"
                           type="radio"
                           name="status"
                           value="inactive"
                           {{ $department->status == 'inactive' ? 'checked' : '' }}>
                    <label class="form-check-label">Inactive</label>
                  </div>

                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  Update
                </button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

</div>

@endsection