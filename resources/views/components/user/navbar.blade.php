            <!-- Header -->

            <div class="navbar navbar-expand navbar-light border-bottom-2" id="default-navbar" data-primary>

                <!-- Navbar toggler -->
                <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button"
                    data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>

                <!-- Navbar Brand -->
                <a href="index.html" class="navbar-brand mr-16pt d-lg-none">
                    <span class="d-none d-lg-block">Luma</span>
                </a>

                <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{route('home')}}" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('pelatihan', 'alur-belajar') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                            data-caret="false">Pelatihan</a>
                        <div class="dropdown-menu">
                            <a href="{{route('user.pelatihan')}}" class="dropdown-item">Cari Pelatihan</a>
                            <a href="{{route('user.alur-belajar')}}" class="dropdown-item">Alur Belajar</a>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->routeIs('user.knowledge') ? 'active' : '' }}">
                        <a href="{{route('user.knowledge')}}" class="nav-link">Pengetahuan</a>
                    </li>
                    @auth
                    <li class="nav-item {{ request()->routeIs('user.learninghistory') ? 'active' : '' }}">
                        <a href="{{route('user.learninghistory')}}" class="nav-link">Riwayat Pembelajaran</a>
                    </li>
                    {{-- <li class="nav-item {{ request()->routeIs('user.favourite') ? 'active' : '' }}">
                        <a href="{{route('user.favourite.index')}}" class="nav-link">Favorit</a>
                    </li>  --}}
                    <li class="nav-item {{ request()->routeIs('user.favourite') ? 'active' : '' }}">
                        <a href="{{route('rank.index')}}" class="nav-link">Peringkat</a>
                    </li> 
                    @endauth
                </ul>

                <ul class="nav navbar-nav ml-auto mr-0">
                    
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-dark">Logout</button>
                            </form>
                        </li>

                    @else 
                        <li class="nav-item">
                            <a href="/login" class="btn btn-outline-dark">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="btn btn-outline-dark">Register</a>
                        </li>
                    
                    @endauth
                    
                </ul>
            </div>