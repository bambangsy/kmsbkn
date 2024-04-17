@extends('layouts.base_manager')

@section('sidebar')
   @include('components.admin.sidebar')
@endsection

@section('content')
    @yield('content')
@endsection