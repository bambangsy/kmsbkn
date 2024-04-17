@extends('layouts.admin')


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">Profil Admin</div>
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="{{ auth()->user()->profile_image ?? 'default-avatar.png' }}" class="rounded-circle img-fluid" alt="Profile Image" style="width: 150px; height: 150px;">
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label class="form-label"><strong>Nama:</strong></label>
                                <p class="fs-5">{{ auth()->user()->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Email:</strong></label>
                                <p class="fs-5">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection