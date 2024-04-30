
@extends('layouts.user')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Back</a>
            </div>
        </div>
        @if($knowledge)
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <iframe src="{{ asset('storage/' . $knowledge->file) }}" width="100%" height="600px"></iframe>
                            <h1 class="card-title my-3">{{ $knowledge->name }}</h1>
                            <p class="card-text">{{ $knowledge->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Pengetahuan tidak ditemukan atau telah dihapus.
            </div>
        @endif
    </div>
@endsection
