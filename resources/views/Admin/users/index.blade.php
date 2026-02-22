@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">




    

<div class="card shadow">
<div class="card-header">
    <h4>All Users</h4>
</div>

<div class="card-body">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Verified</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>
@foreach($users as $key => $user)
<tr>
    <td>{{ $users->firstItem() + $key }}</td>

    <td>
        {{ $user->first_name }} {{ $user->last_name }}
    </td>

    <td>{{ $user->phone }}</td>

    <td>{{ $user->email }}</td>

    <td>
        @if($user->is_verified)
            <span class="badge bg-success">Verified</span>
        @else
            <span class="badge bg-danger">Not Verified</span>
        @endif
    </td>

    <td>
        <a href="{{ route('admin.users.show',$user->id) }}"
           class="btn btn-sm btn-info">View</a>

        <a href="{{ route('admin.users.edit',$user->id) }}"
           class="btn btn-sm btn-primary">Edit</a>

        <form action="{{ route('admin.users.destroy',$user->id) }}"
              method="POST"
              style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger"
                onclick="return confirm('Delete this user?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $users->links() }}

</div>
</div>

</div>
</div>