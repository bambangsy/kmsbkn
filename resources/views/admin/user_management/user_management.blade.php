@extends('layouts.admin')


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div>
                <div class="col-md-8">
                    <h1 class="text-3xl font-bold">Manajemen User</h1>
                    <form method="GET" action="{{ route('admin.user_management.create') }}">
                        @csrf
                        <button type="submit" name="value" value="user">Tambah</button>
                    </form>

                    <div class="mt-5">
                        <label for="filter" class="block font-medium text-sm text-gray-700 dark:text-white">
                            Filter Validasi:</label>
                            
                            <select id="filter" name="filter"
                                class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="window.location.href = '{{ route('admin.user_management', ['filter' => 'sudah_divalidasi']) }}'">
                                <option value="sudah_divalidasi">
                                        Sudah Divalidasi
                                </option>
                                <option value="belum_divalidasi" selected>Belum Divalidasi</option>
                            </select>
        
                            
                    <script>
                        function filterSelection() {
                            var filter = document.getElementById("filter").value;
                            console.log(filter);
            
            
                            
                            // Logika untuk penyaringan berdasarkan nilai yang dipilih
                        }
                    </script>


                    </div>
                    <table class="mt-5">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                @if ($user->is_validated == $filter)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>Tervalidasi</td>
                                        <td class="whitespace-nowrap py-2 flex justify-end">
                                            <form action="{{ route('admin.user_management.accept', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit">
                                                    Terima</button>
                                            </form>
                                            <form action="{{ route('admin.user_management.declined', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit">
                                                    Tolak</button>
                                            </form>
                                            <form action="{{ route('admin.user_management.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
