@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('admin.user_management') }}" class="btn btn-primary">Kembali</a>
                <h1 class="text-3xl font-bold">Create User</h1>
                <form action="{{ route('admin.user_management.store') }}" method="POST">
                    @csrf
                    {{-- Nama --}}
                    <div class="mb-5 mt-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama:</label>
                        <input type="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="name" placeholder="Masukkan Nama Anda" required>
                    </div>

                    {{-- Email --}}
                    <div class="mb-5 mt-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email:</label>
                        <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="email" placeholder="Masukkan email" required>
                    </div>

                    {{-- Password --}}
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password:</label>
                        <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="password" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
