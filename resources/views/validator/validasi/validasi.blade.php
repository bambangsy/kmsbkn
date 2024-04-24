@extends('layouts.validator')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('knowledge.create') }}"
                        class="bg-blue-500 px-5 py-3 rounded-md text-white shadow-sm hover:bg-blue-600">
                        Add
                    </a>

                    <h1>Belum Diapprove</h1>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                        <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Name</th>
                                                <th scope="col" class="px-6 py-4">Description</th>
                                                <th scope="col" class="px-6 py-4">File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($knowledges->where('status', 0) as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->description }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    <td class="whitespace-nowrap py-2 flex justify-end">

                                                        <a href="{{ route('knowledge.edit', $knowledge->id) }}"
                                                            class="bg-yellow-500 px-5 py-3 rounded-md text-white shadow-sm hover:bg-yellow-600 ">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('validasiknowledge.approve', $knowledge->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit"
                                                                class="bg-green-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-green-600">
                                                                Approve
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('validasiknowledge.reject', $knowledge->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit"
                                                                class="bg-red-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-red-600">
                                                                Reject
                                                            </button>
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


                    <h1>Sudah</h1>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                        <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Name</th>
                                                <th scope="col" class="px-6 py-4">Description</th>
                                                <th scope="col" class="px-6 py-4">File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($knowledges->where('status', 1) as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->description }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>




                    <h1>Reject</h1>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                        <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Name</th>
                                                <th scope="col" class="px-6 py-4">Description</th>
                                                <th scope="col" class="px-6 py-4">File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($knowledges->where('status', 2) as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->description }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

