@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">


    
<div class="card shadow-lg border-0 p-4">

    <div class="row">

        <div class="col-md-6 text-center">
            <img src="{{ asset('storage/'.$poster->image) }}"
                 class="img-fluid rounded shadow"
                 style="max-height:450px; object-fit:contain;">
        </div>

        <div class="col-md-6">

            <h3 class="fw-bold mb-3">
                {{ ucfirst(str_replace('_',' ',$poster->type)) }}
            </h3>

            <p>
                <strong>Uploaded:</strong>
                {{ $poster->created_at->format('d M Y h:i A') }}
            </p>

            <hr>

            <a href="{{ route('admin.posters.edit',$poster->id) }}"
               class="btn btn-primary">
               Edit Poster
            </a>

            <a href="{{ route('admin.posters.index') }}"
               class="btn btn-secondary ms-2">
               Back
            </a>

        </div>

    </div>

</div>

</div>
</div>