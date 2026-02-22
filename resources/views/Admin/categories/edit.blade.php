@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

    <div class="section-header">
        <h1>Edit Category</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.categories.index') }}" 
               class="btn btn-light border">
                <i data-feather="arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="section-body">

        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Update Category Information</h4>
            </div>

            <div class="card-body">

                <form method="POST" 
                      action="{{ route('admin.categories.update', $category) }}" 
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- Left Side -->
                        <div class="col-md-8">

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Category Title
                                </label>
                                <input type="text" 
                                       name="title" 
                                       value="{{ old('title', $category->title) }}" 
                                       class="form-control"
                                       required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Change Image
                                </label>
                                <input type="file" 
                                       name="image" 
                                       class="form-control-file">
                                <small class="text-muted">
                                    Leave empty if you don’t want to change image.
                                </small>
                            </div>

                        </div>

                        <!-- Right Side (Current Image Preview) -->
                        <div class="col-md-4 text-center">

                            <label class="font-weight-bold d-block mb-3">
                                Current Image
                            </label>

                            <img src="{{ asset('storage/'.$category->image) }}" 
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height:220px; object-fit:cover;">

                        </div>

                    </div>

                    <hr>

                    <div class="text-right">
                        <button type="submit" 
                                class="btn btn-primary">
                            <i data-feather="save"></i> Update Category
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
