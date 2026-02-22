@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

<div class="card shadow">
    <div class="card-header d-flex justify-content-between">
        <h4>All Attributes</h4>
        <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary">+ Create Attribute</a>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    {{-- <th>Category</th> --}}
                    <th>Attribute</th>
                    <th>Values</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($attributes as $key => $attribute)
                <tr>
                    <td>{{ $key+1 }}</td>
                    {{-- <td>{{ $attribute->category->title }}</td> --}}
                    <td>{{ $attribute->name }}</td>
                    <td>
                        @foreach($attribute->values as $value)
                            <span class="badge bg-info">{{ $value->value }}</span>
                        @endforeach
                    </td>
                    <td>{{ $attribute->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.attributes.edit',$attribute->id) }}" class="btn btn-sm btn-dark">Edit</a>
                        <form action="{{ route('admin.attributes.destroy',$attribute->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
</div>