@extends('layouts.user')
@section('content')
    <!-- Page Content -->


    
    <div class="container page__container mt-5">

    <table class="table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>User Name</th>
                <th>Point</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usersWithPoints as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['point'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <!-- // END Page Content -->
@endsection
