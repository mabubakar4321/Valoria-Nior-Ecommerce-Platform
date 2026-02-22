@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

    <div class="section-header">
        <h1>Create Category</h1>
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
                <h4>New Category Information</h4>
            </div>

            <div class="card-body">

                <form method="POST" 
                      action="{{ route('admin.categories.store') }}" 
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-8">

                            <!-- Title -->
                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Category Title
                                </label>
                                <input type="text" 
                                       name="title" 
                                       class="form-control"
                                       placeholder="Enter category title"
                                       value="{{ old('title') }}"
                                       required>
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Category Image
                                </label>
                                <input type="file" 
                                       name="image" 
                                       class="form-control-file"
                                       required>
                                <small class="text-muted">
                                    Recommended size: 500x500px
                                </small>
                            </div>

                        </div>

                        <!-- Right Info Panel -->
                        <div class="col-md-4">

                            <div class="alert alert-light border">
                                <h6 class="font-weight-bold mb-2">Guidelines</h6>
                                <ul class="mb-0 small">
                                    <li>Use clear descriptive titles</li>
                                    <li>Upload high quality images</li>
                                    <li>Avoid duplicate categories</li>
                                </ul>
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="text-right">
                        <button type="submit" 
                                class="btn btn-primary">
                            <i data-feather="save"></i> Save Category
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>
