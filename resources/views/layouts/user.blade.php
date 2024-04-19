<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('components.user.head')

<body class="layout-app ">

    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>

    <!-- Drawer Layout -->

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content">

            @include('components.user.navbar')

            @yield('content')

            @include('components.user.footer')

        </div>
    </div>

    <!-- // END Drawer Layout -->

    @include('components.user.script')

</body>

</html>
