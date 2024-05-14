@extends('layouts.admin')


@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-1 gap-8 justify-center">
        <!-- Highlight Knowledge Section -->
        <div class="col-md-8 bg-white dark:bg-gray-800 rounded-lg p-6">
            <h1 class="text-3xl font-bold">Manajemen Front Page</h1>
            <h2 class="text-2xl mt-3">Highlight Knowledge</h2>
            <form method="GET" action="{{ route('admin.frontpage_management.create') }}" class="mt-3">
                @csrf
                <button type="submit" name="value" value="knowledge" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
            </form>

            <div class="overflow-x-auto mt-5">
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Order</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($knowledges as $knowledge)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $knowledge->order }}</td>
                            <td class="px-4 py-2">{{ $knowledge->name }}</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.frontpage_management.destroy', $knowledge->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" name="deleted_value" value="knowledge">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Highlight Path Section -->
        <div class="col-md-8 bg-white dark:bg-gray-800  rounded-lg p-6">
            <h1 class="text-3xl font-bold">Manajemen Front Page</h1>
            <h2 class="text-2xl mt-3">Highlight Path</h2>
            <form method="GET" action="{{ route('admin.frontpage_management.create') }}" class="mt-3">
                @csrf
                <button type="submit" name="value" value="path" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
            </form>

            <div class="overflow-x-auto mt-5">
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Order</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paths as $path)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $path->order }}</td>
                            <td class="px-4 py-2">{{ $path->name }}</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.frontpage_management.destroy', $path->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" name="deleted_value" value="path">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Highlight Course Section -->
        <div class="col-md-8 bg-white dark:bg-gray-800 rounded-lg p-6">
            <h1 class="text-3xl font-bold">Manajemen Front Page</h1>
            <h2 class="text-2xl mt-3">Highlight Course</h2>
            <form method="GET" action="{{ route('admin.frontpage_management.create') }}" class="mt-3">
                @csrf
                <button type="submit" name="value" value="course" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
            </form>

            <div class="overflow-x-auto mt-5">
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Order</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $course->order }}</td>
                            <td class="px-4 py-2">{{ $course->name }}</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.frontpage_management.destroy', $course->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" name="deleted_value" value="course">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection