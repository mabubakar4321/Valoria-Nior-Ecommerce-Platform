@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">





    <div class="card shadow p-4">

<h4 class="mb-3">Edit Poster</h4>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

<form action="{{ route('admin.posters.update',$poster->id) }}"
      method="POST"
      enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label class="form-label">Poster Type</label>
    <input type="text"
           name="type"
           value="{{ $poster->type }}"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Current Image</label><br>
    <img src="{{ asset('storage/'.$poster->image) }}"
         width="200"
         class="mb-3"
         style="border-radius:10px;">
</div>

<div class="mb-3">
    <label class="form-label">Change Image (Optional)</label>
    <input type="file"
           name="image"
           class="form-control">
</div>

<button class="btn btn-primary">
    Update Poster
</button>

<a href="{{ route('admin.posters.index') }}"
   class="btn btn-secondary ms-2">
   Back
</a>

</form>

</div>
</div>