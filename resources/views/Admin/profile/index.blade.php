@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

    <div class="section-header">
        <h1>Profile</h1>
    </div>

    <div class="section-body">

        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body">

                <div class="row align-items-center">

                    <!-- Profile Avatar -->
                    <div class="col-md-3 text-center mb-4 mb-md-0">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('valoria/assets/img/user.png') }}"
                                 class="rounded-circle img-fluid border"
                                 style="width:130px; height:130px; object-fit:cover; border-width:4px;">
                            <span class="badge badge-primary position-absolute" style="bottom:0; right:0; border-radius:50%; width:20px; height:20px;">
                                <i data-feather="check" class="text-white" style="width:12px; height:12px;"></i>
                            </span>
                        </div>
                        <h5 class="mt-3 mb-0 font-weight-bold">{{ $admin->name }}</h5>
                        <small class="text-muted">{{ $admin->role ?? 'Administrator' }}</small>
                    </div>

                    <!-- Profile Information -->
                    <div class="col-md-9">
                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted font-weight-bold">Full Name</div>
                            <div class="col-sm-8">{{ $admin->name }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted font-weight-bold">Email Address</div>
                            <div class="col-sm-8">{{ $admin->email }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted font-weight-bold">Phone Number</div>
                            <div class="col-sm-8">{{ $admin->phone ?? 'Not Provided' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted font-weight-bold">Role</div>
                            <div class="col-sm-8">{{ $admin->role ?? 'Administrator' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted font-weight-bold">Account Created</div>
                            <div class="col-sm-8">{{ $admin->created_at->format('d M Y, h:i A') }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted font-weight-bold">Last Updated</div>
                            <div class="col-sm-8">{{ $admin->updated_at->format('d M Y, h:i A') }}</div>
                        </div>

                        <div class="mt-4">
                            {{-- <a href="{{ route('admin.profile.edit') }}" 
                               class="btn btn-warning mr-2">
                                <i data-feather="edit"></i> Edit Profile
                            </a> --}}
                            <a href="{{ route('admin.dashboard') }}" 
                               class="btn btn-secondary">
                                <i data-feather="arrow-left"></i> Back Dashboard
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
