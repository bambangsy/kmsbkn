
@extends('layouts.validator')

@section('content')

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h1 class="mb-6 text-3xl">Antrian</h1>
                    @if (session('warning'))
                    <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  
                        <span class="block sm:inline">{{ session('warning') }}</span>
                        <span id="close-btn" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                          <svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                      </div>
                      <script>
                        document.getElementById('close-btn').addEventListener('click', function() {
                          document.getElementById('alert').style.display = 'none';
                        });
                      </script>
                
                
                    @endif
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
                                            @foreach ($knowledges_queue->where('status', 0) as $knowledge)
                                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $knowledge->name }}</td>
                                                    <td> {{ strlen($knowledge->description) > 50 ? substr($knowledge->description, 0, 50) . '...' : $knowledge->description }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ asset('storage/' . $knowledge->file) }}"
                                                            class="text-blue-500 hover:underline">Download</a>
                                                    </td>
                                                    <td class="whitespace-nowrap py-2 flex justify-end">

                                                    
                                                        <form action="{{ route('validasiknowledge.retrieve', $knowledge->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit"
                                                                class="bg-green-500 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-green-600">
                                                                Approve
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


                    <h1 class="mb-6 text-3xl">Belum Disetujui</h1>
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
                                                    <td> {{ strlen($knowledge->description) > 50 ? substr($knowledge->description, 0, 50) . '...' : $knowledge->description }}</td>
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
                                                        <form action="{{ route('validasiknowledge.cancel', $knowledge->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit"
                                                                class="bg-gray-900 px-5 py-3 ml-2 rounded-md text-white shadow-sm hover:bg-gray-700">
                                                                Cancel
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


                    <h1 class="mb-6 mt-6 text-3xl">Sudah Disetujui</h1>
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
                                                    <td> {{ strlen($knowledge->description) > 50 ? substr($knowledge->description, 0, 50) . '...' : $knowledge->description }}</td>
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




                    <h1 class="mb-6 mt-6 text-3xl">Ditolak</h1>
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
                                                    <td> {{ strlen($knowledge->description) > 50 ? substr($knowledge->description, 0, 50) . '...' : $knowledge->description }}</td>
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

