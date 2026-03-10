@extends('backend.layout.master')

@section('main_content')

<div class="content-wrapper">

  <!-- Header -->

  <div class="content-header">
    <div class="container-fluid">


  <div class="row mb-2">

    <div class="col-sm-6">
      <h1 class="m-0">Create Position</h1>
    </div>

    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">

        <li class="breadcrumb-item">
          <a href="{{ url('/positions') }}">
            <i class="fas fa-arrow-left"></i> Back
          </a>
        </li>

        <li class="breadcrumb-item active">
          Create Position
        </li>

      </ol>
    </div>

  </div>

</div>


  </div>

  <!-- Main Content -->

  <div class="content">
    <div class="container-fluid">


  <div class="row">

    <div class="col-lg-12">

      <div class="card card-primary">

        <div class="card-header">
          <h3 class="card-title">Fill Position Form</h3>
        </div>


        <form action="{{ url('/positions') }}" method="POST">
          @csrf

          <div class="card-body">


            <!-- Position Title -->
            <div class="form-group">

              <label>Position Title</label>

              <input type="text"
                     name="position_title"
                     class="form-control @error('position_title') is-invalid @enderror"
                     value="{{ old('position_title') }}"
                     placeholder="Enter Position Title">

              @error('position_title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

            </div>


            <!-- Description -->
            <div class="form-group">

              <label>Description</label>

              <textarea
                  name="description"
                  rows="3"
                  class="form-control @error('description') is-invalid @enderror"
                  placeholder="Enter Description">{{ old('description') }}</textarea>

              @error('description')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

            </div>


            <!-- Level -->
            <div class="form-group">

              <label>Level</label>

              <input type="text"
                     name="level"
                     class="form-control @error('level') is-invalid @enderror"
                     value="{{ old('level') }}"
                     placeholder="Example: Junior / Senior / Manager">

              @error('level')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

            </div>


            <!-- Department -->
            <div class="form-group">

              <label>Department</label>

              <select name="department_id"
                      class="form-control @error('department_id') is-invalid @enderror">

                <option value="">Select Department</option>

                @foreach($departments as $department)

                  <option value="{{ $department->department_id }}">

                    {{ $department->department_name }}

                  </option>

                @endforeach

              </select>

              @error('department_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

            </div>


            <!-- Managerial -->
            <div class="form-group">

              <label>Managerial Position</label>

              <div class="form-check">

                <input class="form-check-input"
                       type="radio"
                       name="is_managerial"
                       value="1">

                <label class="form-check-label">
                  Yes
                </label>

              </div>

              <div class="form-check">

                <input class="form-check-input"
                       type="radio"
                       name="is_managerial"
                       value="0"
                       checked>

                <label class="form-check-label">
                  No
                </label>

              </div>

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
