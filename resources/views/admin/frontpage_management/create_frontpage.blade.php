@extends('layouts.admin')


@section('content')
<div class="container mx-auto mt-10">

        <div class="w-full  bg-white dark:bg-gray-800  rounded-lg p-6">
            <a href="{{ route('admin.frontpage_management') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">Kembali</a>
            <h1 class="text-3xl font-bold mb-5">Create Front Page</h1>
            <form action="{{ route('admin.frontpage_management.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pilih Opsi:</label>
                    <input type="hidden" name="value" value="knowledge">
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="dropdown" name="opsi">
                        @foreach($content as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Buat</button>
            </form>
        </div>
</div>

@endsection