@extends('backend.layout.master')

@section('main_content')

<div class="content-wrapper">

  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1 class="m-0">Create Department</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ url('/departments') }}">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </li>
            <li class="breadcrumb-item active">
              Create Department
            </li>
          </ol>
        </div>

      </div>

      {{-- Global Error Alert --}}
      {{-- @if ($errors->any())
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      @endif --}}

    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-12">
          <div class="card card-primary">

            <div class="card-header">
              <h3 class="card-title">Fill Form</h3>
            </div>

            <form action="{{ url('/departments') }}" method="POST">
              @csrf

              <div class="card-body">

                {{-- Department Code --}}
             <div class="form-group">
    <label>Department Code</label>
    <input type="text"
           class="form-control @error('department_code') is-invalid @enderror"
           name="department_code"
           value="{{ old('department_code', $randomCode) }}"  {{-- auto-fill --}}
           placeholder="Enter Department Code"
           readonly> {{-- Make it readonly so user can't edit if needed --}}

    @error('department_code')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

                {{-- Department Name --}}
                <div class="form-group">
                  <label>Department Name</label>
                  <input type="text"
                         class="form-control @error('department_name') is-invalid @enderror"
                         name="department_name"
                         value="{{ old('department_name') }}"
                         placeholder="Enter Department Name">

                  @error('department_name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                {{-- Description --}}
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="decription"
                            rows="3"
                            class="form-control @error('decription') is-invalid @enderror"
                            placeholder="Enter Description">{{ old('decription') }}</textarea>

                  @error('decription')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                  <label>Status</label>

                  <div class="form-check">
                    <input class="form-check-input"
                           type="radio"
                           name="status"
                           value="active"
                           {{ old('status') == 'active' ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input"  checked
                           type="radio"
                           name="status"
                           value="inactive"
                           {{ old('status') == 'inactive' ? 'checked' : '' }}>
                    <label class="form-check-label">Inactive</label>
                  </div>

                  @error('status')
                    <div class="text-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror

                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  Save
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