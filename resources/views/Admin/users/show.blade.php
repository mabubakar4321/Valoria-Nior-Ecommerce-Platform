@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">
{{-- <div class="main-content container py-4"> --}}

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">

            {{-- Header --}}
            <div class="d-flex align-items-center mb-4">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                     style="width:70px;height:70px;font-size:24px;">
                    {{ strtoupper(substr($user->first_name, 0, 1)) }}
                </div>

                <div class="ms-3">
                    <h4 class="mb-0 fw-bold">
                        {{ $user->first_name }} {{ $user->last_name }}
                    </h4>

                    <span class="badge px-3 py-2 mt-2 
                        {{ $user->is_verified ? 'bg-success' : 'bg-danger' }}">
                        {{ $user->is_verified ? 'Verified' : 'Not Verified' }}
                    </span>
                </div>
            </div>

            <hr class="mb-4">

            {{-- User Details --}}
            <div class="row g-4">

                <div class="col-md-6">
                    <div class="bg-light p-3 rounded-3">
                        <small class="text-muted">Phone</small>
                        <div class="fw-semibold fs-6">
                            {{ $user->phone }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bg-light p-3 rounded-3">
                        <small class="text-muted">Alternate Phone</small>
                        <div class="fw-semibold fs-6">
                            {{ $user->alternate_phone ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bg-light p-3 rounded-3">
                        <small class="text-muted">Email</small>
                        <div class="fw-semibold fs-6">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bg-light p-3 rounded-3">
                        <small class="text-muted">Alternate Email</small>
                        <div class="fw-semibold fs-6">
                            {{ $user->alternate_email ?? '-' }}
                        </div>
                    </div>
                </div>

            </div>

            {{-- Back Button --}}
            <div class="mt-5 text-end">
                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-outline-dark px-4 py-2 rounded-3">
                    ← Back to Users
                </a>
            </div>

        </div>
    </div>

</div>
</div>