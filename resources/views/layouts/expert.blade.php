<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset("flowbite/dist/flowbite.min.css")}}" rel="stylesheet" />
</head>

<body>
    @include('components.expert.navbar')
    @include('components.expert.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4  mt-14">

            @yield('content')
        </div>
    </div>

    <script src="{{asset("flowbite/dist/flowbite.min.js")}}""></script>
</body>

</html>
