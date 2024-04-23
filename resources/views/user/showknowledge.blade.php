
@extends('layouts.user')
@section('content')
    <!-- BEFORE Page Content -->

    <!-- // END BEFORE Page Content -->
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Back</a>

    
    <iframe src ="{{ asset('storage/'.$knowledge->file) }}" width="100%" height="600px"></iframe>

    <!-- // END Page Content -->
@endsection
