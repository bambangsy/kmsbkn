@php
    $knowledges = [
        (object) ['name' => 'knowledge', 'description' => 'description', 'file' => 'file', 'status' => 'status'],
    ];
@endphp
<x-app-layout>




    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pelatihan') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-3xl">Alur Pelatihan</h1>
                    <a href="{{ route('knowledge.create') }}"
                        class="bg-blue-500 px-5 py-3 rounded-md text-white shadow-sm hover:bg-blue-600">
                        Add
                    </a>
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
                                                <th scope="col" class="px-6 py-4">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($knowledges as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $knowledge->description }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        @if ($knowledge->status == 0)
                                                            <span class="text-gray-500">menunggu validasi</span>
                                                        @elseif ($knowledge->status == 1)
                                                            <span class="text-green-500">sudah disetujui</span>
                                                        @elseif ($knowledge->status == 2)
                                                            <span class="text-red-500">ditolak</span>
                                                        @endif

                                                    </td>
                                                    <td class="whitespace-nowrap py-2 flex justify-end">
                                                        <a href="#"
                                                            class="bg-green-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-green-600 ">
                                                            Validate
                                                        </a>
                                                        <a href="#"
                                                            class="bg-yellow-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-yellow-600 ">
                                                            Edit
                                                        </a>
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-red-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-red-600">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($knowledges as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $knowledge->description }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        @if ($knowledge->status == 0)
                                                            <span class="text-gray-500">menunggu validasi</span>
                                                        @elseif ($knowledge->status == 1)
                                                            <span class="text-green-500">sudah disetujui</span>
                                                        @elseif ($knowledge->status == 2)
                                                            <span class="text-red-500">ditolak</span>
                                                        @endif

                                                    </td>
                                                    <td class="whitespace-nowrap py-2 flex justify-end">
                                                        <a href="#"
                                                            class="bg-green-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-green-600 ">
                                                            Validate
                                                        </a>
                                                        <a href="#"
                                                            class="bg-yellow-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-yellow-600 ">
                                                            Edit
                                                        </a>
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-red-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-red-600">
                                                                Delete
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
                </div>





                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-3xl">Pelatihan</h1>
                    <a href="{{ route('knowledge.create') }}"
                        class="bg-blue-500 px-5 py-3 rounded-md text-white shadow-sm hover:bg-blue-600">
                        Add
                    </a>
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
                                                <th scope="col" class="px-6 py-4">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($knowledges as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $knowledge->description }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        @if ($knowledge->status == 0)
                                                            <span class="text-gray-500">menunggu validasi</span>
                                                        @elseif ($knowledge->status == 1)
                                                            <span class="text-green-500">sudah disetujui</span>
                                                        @elseif ($knowledge->status == 2)
                                                            <span class="text-red-500">ditolak</span>
                                                        @endif

                                                    </td>
                                                    <td class="whitespace-nowrap py-2 flex justify-end">

                                                        <a href="#"
                                                            class="bg-yellow-500 px-5 py-3 rounded-md text-white shadow-sm hover:bg-yellow-600 ">
                                                            Edit
                                                        </a>
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-red-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-red-600">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($knowledges as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $knowledge->description }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        @if ($knowledge->status == 0)
                                                            <span class="text-gray-500">menunggu validasi</span>
                                                        @elseif ($knowledge->status == 1)
                                                            <span class="text-green-500">sudah disetujui</span>
                                                        @elseif ($knowledge->status == 2)
                                                            <span class="text-red-500">ditolak</span>
                                                        @endif

                                                    </td>
                                                    <td class="whitespace-nowrap py-2 flex justify-end">

                                                        <a href="#"
                                                            class="bg-yellow-500 px-5 py-3 rounded-md text-white shadow-sm hover:bg-yellow-600 ">
                                                            Edit
                                                        </a>
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-red-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-red-600">
                                                                Delete
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
