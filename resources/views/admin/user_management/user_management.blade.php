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
                            class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            onchange="window.location.href = this.value">
                            <option value="{{ route('admin.user_management', ['filter' => 'sudah_divalidasi']) }}" @if($filter == 'sudah_divalidasi') selected @endif>
                                Sudah Divalidasi
                            </option>
                            <option value="{{ route('admin.user_management', ['filter' => 'belum_divalidasi']) }}" @if($filter == 'belum_divalidasi') selected @endif>
                                Belum Divalidasi
                            </option>
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
                            @if(request('filter') === 'sudah_divalidasi')
                                @foreach ($validated_users as $validated_user)
                                
                                        <tr>
                                            <td>{{ $validated_user->name }}</td>
                                            <td>{{ $validated_user->email }}</td>
                                            <td>Tervalidasi</td>
                                            <td class="whitespace-nowrap py-2 flex justify-end">
                                                <form action="{{ route('admin.user_management.accept', ['id' => $validated_user->id, 'filter' => $filter]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit">
                                                        Terima</button>
                                                </form>
                                                <form action="{{ route('admin.user_management.declined', ['id' => $validated_user->id, 'filter' =>  $filter]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit">
                                                        Tolak</button>
                                                </form>
                                                <form action="{{ route('admin.user_management.destroy', ['id' => $validated_user->id, 'filter' => $filter]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    
                                @endforeach
                            @endif
                            @if(request('filter') === 'belum_divalidasi' || request('filter') === null)
                            @foreach ($not_validated_users as $not_validated_user)
                                    
                                <tr>
                                    <td>{{ $not_validated_user->name }}</td>
                                    <td>{{ $not_validated_user->email }}</td>
                                    <td>Belum Tervalidasi</td>
                                    <td class="whitespace-nowrap py-2 flex justify-end">
                                        <form action="{{ route('admin.user_management.accept', [$not_validated_user->id,'filter' => $filter]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit">
                                                Terima</button>
                                        </form>
                                        <form action="{{ route('admin.user_management.declined', [$not_validated_user->id,'filter' => $filter]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit">
                                                Tolak</button>
                                        </form>
                                        <form action="{{ route('admin.user_management.destroy', [$not_validated_user->id,'filter' => $filter]) }}"
                                            method="DELETE">
                                            @csrf
                                            <button type="submit">
                                                Hapus</button>
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
    </div>
@endsection
