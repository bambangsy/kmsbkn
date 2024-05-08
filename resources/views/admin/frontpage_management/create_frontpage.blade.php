@extends('layouts.admin')


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('admin.frontpage_management') }}" class="btn btn-primary">Kembali</a>
            <h1 class="text-3xl font-bold">Create Front Page</h1>
        <form action="{{ route('admin.frontpage_management.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dropdown">Pilih Opsi:</label>
                <input type="hidden" name="value" value="knowledge">
                <select class="form-control" id="dropdown" name="opsi">
                    @foreach($content as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="value" value={{ $value }}>Buat</button>
        </form>
         
        </div>
    </div>
</div>
@endsection