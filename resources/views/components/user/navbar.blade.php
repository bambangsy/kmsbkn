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
                    <li class="nav-item active">
                        <a href="{{route('home')}}" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                            data-caret="false">Pelatihan</a>
                        <div class="dropdown-menu">
                            <a href="{{route('pelatihan')}}" class="dropdown-item">Cari Pelatihan</a>
                            <a href="s{{route('alur-belajar')}}" class="dropdown-item">Alur Belajar</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="pricing.html" class="nav-link">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="pricing.html" class="nav-link">FAQ</a>
                    </li>
        
                </ul>

                <ul class="nav navbar-nav ml-auto mr-0">
                    
                    @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="btn btn-outline-dark">dashboard</a>
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

            <!-- // END Header -->
