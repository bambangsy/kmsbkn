@extends('layouts.admin')


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div>
            <div class="col-md-8">
                <h1 class="text-3xl font-bold">Manajemen Front Page</h1>
                <h2 class="text-2xl mt-3">Highlight Knowledge</h2>
                <form method="GET" action="{{ route('admin.frontpage_management.create') }}">
                    @csrf
                    <button type="submit" name="value" value="knowledge" readonly>Add</button>
                </form>
                
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @foreach($knowledges as $knowledge)
                    <tr class="list" data-id="{{ $knowledge->id }}">
                        <td>{{ $knowledge->order }}</td>
                        <td>{{ $knowledge->name }}</td>
                        <td><a href="#">Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.frontpage_management.destroy', $knowledge->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" name= "deleted_value" value = "knowledge">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
               
            </table>
            </div>

        </div>
        <div class="row justify-content-center">
        <ul id="sortable-list" class="space-y-2">
            <li class="bg-gray-200 p-4 cursor-grab">Item 1</li>
            <li class="bg-gray-200 p-4 cursor-grab">Item 2</li>
            <li class="bg-gray-200 p-4 cursor-grab">Item 3</li>
          </ul>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            
    
            var sortableList = document.getElementById('sortable-list');
            var sortable = new Sortable(sortableList, {
            animation: 150,
            onUpdate: function (evt) {
                console.log('Order updated:', evt.newIndex);
                
            }
            });

        </script>
        


        <div>
            <div class="col-md-8">
                <h1 class="text-3xl font-bold">Manajemen Front Page</h1>
                <h2 class="text-2xl mt-3">Highlight Alur</h2>
                <form method="GET" action="{{ route('admin.frontpage_management.create') }}">
                    @csrf
                    <button type="submit" name="value" value="path" readonly>Add</button>
                </form>
                
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paths as $path)
                    <tr>
                        <td>{{ $path->order }}</td>
                        <td>{{ $path->name }}</td>
                        <td><a href="#">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('admin.frontpage_management.destroy', $path->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" name= "deleted_value" value = "path">Hapus</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

        </div>




        <div>
            <div class="col-md-8">
                <h1 class="text-3xl font-bold">Manajemen Front Page</h1>
                <h2 class="text-2xl mt-3">Highlight Course</h2>
                <form method="GET" action="{{ route('admin.frontpage_management.create') }}">
                    @csrf
                    <button type="submit" name="value" value="course" readonly>Add</button>
                </form>
                
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->order }}</td>
                        <td>{{ $course->name }}</td>
                        <td><a href="#">Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.frontpage_management.destroy', $course->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" name= "deleted_value" value = "course">Hapus</button>
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