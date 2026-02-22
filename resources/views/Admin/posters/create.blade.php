@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">


<div class="card shadow p-4">

<h4 class="mb-3">Upload Posters</h4>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

<form action="{{ route('admin.posters.store') }}"
      method="POST"
      enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label class="form-label">Poster Type</label>
    <input type="text"
           name="type"
           class="form-control"
           placeholder="Example: sales / new_arrival / announcement"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Upload Multiple Images</label>
    <input type="file"
           name="images[]"
           class="form-control"
           multiple
           required>
</div>

<button class="btn btn-primary">
    Upload Posters
</button>

<a href="{{ route('admin.posters.index') }}"
   class="btn btn-secondary ms-2">
   Back
</a>

</form>

</div>
</div>