@extends('layouts.admin')


@section('content')


    <div class="container mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6">Manajemen User</h1>
                <form method="GET" action="{{ route('admin.user_management.create') }}">
                    @csrf
                    <button type="submit" name="value" value="user"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Tambah
                    </button>
                </form>
                
                <div class="mt-5">
                    <label for="filter" class="block font-medium text-sm text-gray-700 dark:text-white">
                        Filter Validasi:</label>
                    <select id="filter" name="filter"
                        class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        onchange="window.location.href = this.value">
                        <option value="{{ route('admin.user_management', ['filter' => 'sudah_divalidasi']) }}" @if($filter == 'sudah_divalidasi') selected @endif>
                            Sudah Divalidasi
                        </option>
                        <option value="{{ route('admin.user_management', ['filter' => 'belum_divalidasi']) }}" @if($filter == 'belum_divalidasi') selected @endif>
                            Belum Divalidasi
                        </option>
                    </select>
                </div>
                
                <div class="overflow-x-auto mt-5">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(request('filter') === 'sudah_divalidasi')
                                @foreach ($validated_users as $validated_user)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $validated_user->name }}</td>
                                        <td class="px-4 py-2">{{ $validated_user->email }}</td>
                                        <td class="px-4 py-2">Tervalidasi</td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <form action="{{ route('admin.user_management.accept', ['id' => $validated_user->id, 'filter' => $filter]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">
                                                    Terima
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.user_management.declined', ['id' => $validated_user->id, 'filter' =>  $filter]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                                    Tolak
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.user_management.destroy', ['id' => $validated_user->id, 'filter' => $filter]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            @if(request('filter') === 'belum_divalidasi' || request('filter') === null)
                                @foreach ($not_validated_users as $not_validated_user)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $not_validated_user->name }}</td>
                                        <td class="px-4 py-2">{{ $not_validated_user->email }}</td>
                                        <td class="px-4 py-2">Belum Tervalidasi</td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <form action="{{ route('admin.user_management.accept', [$not_validated_user->id, 'filter' => $filter]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">
                                                    Terima
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.user_management.declined', [$not_validated_user->id, 'filter' => $filter]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                                    Tolak
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.user_management.destroy', [$not_validated_user->id, 'filter' => $filter]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



@endsection
