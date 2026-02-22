@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

    <div class="section-header">
        <h1>Category Management</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.categories.create') }}" 
               class="btn btn-primary">
                <i data-feather="plus"></i> Create Category
            </a>
        </div>
    </div>

    <div class="section-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">All Categories</h4>
                <span class="badge badge-primary">
                    Total: {{ $categories->total() }}
                </span>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">

                    <table class="table table-hover mb-0 align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Created Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($categories as $index => $category)

                            <tr>
                                <td>
                                    {{ $categories->firstItem() + $index }}
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/'.$category->image) }}"
                                             class="rounded"
                                             width="50"
                                             height="50"
                                             style="object-fit:cover;">

                                        <div class="ml-3">
                                            <strong>{{ $category->title }}</strong>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    {{ $category->created_at->format('d M Y') }}
                                </td>

                                <td class="text-right">

                                    <a href="{{ route('admin.categories.show', $category) }}"
                                       class="btn btn-sm btn-light border">
                                        <i data-feather="eye"></i>
                                    </a>

                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                       class="btn btn-sm btn-light border">
                                        <i data-feather="edit"></i>
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-light border text-danger"
                                                onclick="return confirm('Delete this category?')">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    No categories available.
                                    <br>
                                    <a href="{{ route('admin.categories.create') }}" 
                                       class="btn btn-primary mt-3">
                                        Create First Category
                                    </a>
                                </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card-footer bg-white">
                <div class="d-flex justify-content-end">
                    {{ $categories->links() }}
                </div>
            </div>

        </div>

    </div>
</div>
