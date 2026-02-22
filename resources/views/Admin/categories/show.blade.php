@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

    <div class="section-header">
        <h1>Category Details</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.categories.index') }}" 
               class="btn btn-light border">
                <i data-feather="arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <div class="section-body">

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="row">

                    <!-- Image Section -->
                    <div class="col-md-5 text-center border-right">
                        <img src="{{ asset('storage/'.$category->image) }}" 
                             class="img-fluid rounded shadow-sm mb-3"
                             style="max-height:300px; object-fit:cover;">
                    </div>

                    <!-- Details Section -->
                    <div class="col-md-7">

                        <h3 class="mb-3 font-weight-bold">
                            {{ $category->title }}
                        </h3>

                        <hr>

                        <div class="row mb-3">
                            <div class="col-sm-4 font-weight-bold text-muted">
                                Category ID
                            </div>
                            <div class="col-sm-8">
                                #{{ $category->id }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 font-weight-bold text-muted">
                                Created At
                            </div>
                            <div class="col-sm-8">
                                {{ $category->created_at->format('d M Y, h:i A') }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-4 font-weight-bold text-muted">
                                Last Updated
                            </div>
                            <div class="col-sm-8">
                                {{ $category->updated_at->format('d M Y, h:i A') }}
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('admin.categories.edit', $category) }}" 
                               class="btn btn-warning mr-2">
                                <i data-feather="edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger"
                                        onclick="return confirm('Delete this category?')">
                                    <i data-feather="trash-2"></i> Delete
                                </button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
