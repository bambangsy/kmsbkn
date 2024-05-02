
@extends('layouts.user')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Back</a>
            </div>
        </div>
        @if($course)
            
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if($course->source_id == 1)
                                <iframe src="{{ asset('storage/' . $course->file) }}" width="100%" height="600px"></iframe>
                            @elseif($course->source_id == 2)

                             
                                <iframe src="https://www.youtube.com/embed/{{ str_replace('https://www.youtube.com/watch?v=', '', $course->file) }}" width="100%" height="600px"></iframe>
                            @endif
                            <h1 class="card-title my-3">{{ $course->name }}</h1>
                            <p class="card-text">{{ $course->description }}</p>
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
