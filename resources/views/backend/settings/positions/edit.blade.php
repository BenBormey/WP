<h1>Hello</h1>
@extends('backend.layout.master')

@section('main_content')

<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">

<div class="row mb-2">

<div class="col-sm-6">
<h1 class="m-0">Edit Position</h1>
</div>

<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">

<li class="breadcrumb-item">
<a href="{{ route('positions.index') }}">
<i class="fas fa-arrow-left"></i> Back
</a>
</li>

<li class="breadcrumb-item active">
Edit Position
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


<form action="{{ route('positions.update',$position->position_id) }}" method="POST">

@csrf
@method('PUT')

<div class="card-body">


<div class="form-group">

<label>Position Title</label>

<input type="text"
name="position_title"
class="form-control"
value="{{ old('position_title',$position->position_title) }}">

</div>


<div class="form-group">

<label>Description</label>

<textarea name="description"
class="form-control"
rows="3">{{ old('description',$position->description) }}</textarea>

</div>


<div class="form-group">

<label>Level</label>

<input type="text"
name="level"
class="form-control"
value="{{ old('level',$position->level) }}">

</div>


<div class="form-group">

<label>Department</label>

<select name="department_id" class="form-control">

@foreach($departments as $department)

<option value="{{ $department->department_id }}"
{{ $department->department_id == $position->department_id ? 'selected' : '' }}>

{{ $department->department_name }}

</option>

@endforeach

</select>

</div>


<div class="form-group">

<label>Managerial Position</label>

<div class="form-check">

<input class="form-check-input"
type="radio"
name="is_managerial"
value="1"
{{ $position->is_managerial == 1 ? 'checked' : '' }}>

<label class="form-check-label">
Yes
</label>

</div>

<div class="form-check">

<input class="form-check-input"
type="radio"
name="is_managerial"
value="0"
{{ $position->is_managerial == 0 ? 'checked' : '' }}>

<label class="form-check-label">
No
</label>

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