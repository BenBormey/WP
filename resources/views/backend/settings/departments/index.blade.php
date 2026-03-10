@extends('backend.layout.master')

@section('main_content')

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1 class="m-0">Departments</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">
              <a href="{{ url('/departments/create') }}" class="btn btn-outline-info">
                <i class="fas fa-plus"></i> Add New Department
              </a>
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

          <div class="card">

            <div class="card-header border-0">

              <h3 class="card-title">Departments</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>

                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>

            </div>


            <div class="card-body table-responsive p-0">

              <table class="table table-striped table-valign-middle">

                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Department Code</th>
                    <th>Department Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th width="150">Action</th>
                  </tr>
                </thead>


                <tbody>

                  @if($departments->isEmpty())

                    <tr>
                      <td colspan="6" class="text-danger text-center">
                        No Data Found!
                      </td>
                    </tr>

                  @else

                    @foreach($departments as $key => $value)

                    <tr>

                      <td>
                        <img src="{{ asset('assets/dist/img/default-150x150.png') }}"
                             class="img-circle img-size-32 mr-2">

                        {{ $departments->firstItem() + $key }}
                      </td>

                      <td>{{ $value->department_code }}</td>

                      <td>{{ $value->department_name }}</td>

                      <td>{{ $value->decription }}</td>

                      <td>
                        <button class="btn btn-sm btn-{{ $value->status == 'active' ? 'success' : 'danger' }}">
                          {{ ucfirst($value->status) }}
                        </button>
                      </td>

                      <td>

                  <td>
                 <a href="{{ url('departments/'.$value->department_id.'/edit') }}" class="btn btn-outline-primary">
    <i class="fas fa-edit"></i>
</a>

              <form action="{{ url('departments/'.$value->department_id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this department?');">
        <i class="fas fa-trash"></i>
    </button>
</form>

                  <a href="{{ url('departments/'.$value->department_id) }}" class="btn btn-outline-info">
    <i class="fas fa-eye"></i>
</a>

                </td>

                      </td>

                    </tr>

                    @endforeach

                  @endif

                </tbody>

              </table>

            </div>


            <!-- Pagination LEFT -->
            <div class="card-footer">

              <div class="d-flex justify-content-start">
                {{ $departments->links() }}
              </div>

            </div>


          </div>

        </div>
      </div>

    </div>
  </div>

</div>

@endsection

@section('alert_msg')

@if(session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endif

@endsection