@extends('Admin.Dashbaord.layout')

@section('content')



<div class="main-content">

<div class="card shadow p-4">
<h4>Edit User</h4>
<hr>

<form action="{{ route('admin.users.update',$user->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
<label>First Name</label>
<input type="text" name="first_name"
       value="{{ $user->first_name }}"
       class="form-control">
</div>

<div class="mb-3">
<label>Last Name</label>
<input type="text" name="last_name"
       value="{{ $user->last_name }}"
       class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone"
       value="{{ $user->phone }}"
       class="form-control">
</div>

<div class="mb-3">
<label>Alternate Phone</label>
<input type="text" name="alternate_phone"
       value="{{ $user->alternate_phone }}"
       class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email"
       value="{{ $user->email }}"
       class="form-control">
</div>

<div class="mb-3">
<label>Alternate Email</label>
<input type="email" name="alternate_email"
       value="{{ $user->alternate_email }}"
       class="form-control">
</div>

<div class="mb-3">
<label>
<input type="checkbox" name="is_verified"
    {{ $user->is_verified ? 'checked' : '' }}>
Verified
</label>
</div>

<button class="btn btn-primary">Update User</button>

</form>

</div>
</div>
</div>