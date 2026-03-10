@extends('backend.layout.master')

@section('main_content')

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">


    <div class="col-sm-6">
      <h1 class="m-0">Positions</h1>
    </div>

    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">

        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>

        <li class="breadcrumb-item active">

          <a href="{{ url('/positions/create') }}" class="btn btn-outline-info">
            <i class="fas fa-plus"></i> Add New Position
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

          <h3 class="card-title">
            Positions List
          </h3>

        </div>


        <div class="card-body table-responsive p-0">

          <table class="table table-striped table-valign-middle">

            <thead>

              <tr>
                <th>ID</th>
                <th>Position Title</th>
                <th>Description</th>
                <th>Level</th>
                <th>Department</th>
                <th>Managerial</th>
                <th width="150">Action</th>
              </tr>

            </thead>


            <tbody>

              @if($positions->isEmpty())

                <tr>
                  <td colspan="7" class="text-center text-danger">
                    No Data Found!
                  </td>
                </tr>

              @else

                @foreach($positions as $key => $value)

                <tr>

                  <td>
                    {{ $positions->firstItem() + $key }}
                  </td>

                  <td>
                    {{ $value->position_title }}
                  </td>

                  <td>
                    {{ $value->description }}
                  </td>

                  <td>
                    {{ $value->level }}
                  </td>

                  <td>
                    {{ $value->department->department_name ?? 'N/A' }}
                  </td>

                  <td>

                    <span class="badge badge-{{ $value->is_managerial ? 'success' : 'secondary' }}">

                      {{ $value->is_managerial ? 'Yes' : 'No' }}

                    </span>

                  </td>

                  <td>

                    <a href="{{ url('positions/'.$value->position_id.'/edit') }}"
                       class="btn btn-outline-primary btn-sm">

                      <i class="fas fa-edit"></i>

                    </a>


                    <form action="{{ url('positions/'.$value->position_id) }}"
                          method="POST"
                          style="display:inline-block;">

                      @csrf
                      @method('DELETE')

                      <button type="submit"
                              class="btn btn-outline-danger btn-sm"
                              onclick="return confirm('Delete this position?')">

                        <i class="fas fa-trash"></i>

                      </button>

                    </form>


                    <a href="{{ url('positions/'.$value->position_id) }}"
                       class="btn btn-outline-info btn-sm">

                      <i class="fas fa-eye"></i>

                    </a>

                  </td>

                </tr>

                @endforeach

              @endif

            </tbody>

          </table>

        </div>


        <div class="card-footer">

          <div class="d-flex justify-content-start">

            {{ $positions->links() }}

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
