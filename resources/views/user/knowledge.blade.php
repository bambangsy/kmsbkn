@extends('layouts.user')
@section('content')
    <!-- Page Content -->


    <div class="mdk-box mdk-box--bg-primary bg-dark js-mdk-box mb-24pt" data-effects="parallax-background blend-background">
        <div class="mdk-box__bg">
            <div class="mdk-box__bg-front"
                style="background-image: url(https://umsu.ac.id/artikel/wp-content/uploads/2024/02/cara-cek-data-non-asn-dan-cara-daftarnya-di-bkn.jpeg);">
            </div>
        </div>
        <div class="mdk-box__content justify-content-center">
            <div class="hero container page__container text-center py-112pt">
                <h1 class="text-white text-shadow">Pengetahuan</h1>
                <p class="lead measure-hero-lead mx-auto text-white text-shadow ">Halo Sobat BKN, Ingin membaca artikel
                    terbaru hari ini?</p>
                <form action="{{ route('user.knowledge') }}" method="GET">
                    <div class="relative">
                        <div class="flex flex-col md:flex-row">
                            <input type="search"
                                class="relative m-0 block w-full rounded border border-solid border-neutral-200 bg-white bg-clip-padding px-3 py-[1rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-blue-500 focus:z-[3] focus:border-primary  focus:shadow-inset focus:outline-none opacity-70"
                                placeholder="Search" aria-label="Search" id="exampleFormControlInput4" name="search"
                                value="{{ request()->query('search') }}" />
                            <button class="px-3 btn btn-white text-primary mt-0 md:mt-2 ">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container page__container">

        <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-24pt" style="white-space: nowrap;">
            <div class="w-auto ml-sm-auto table d-flex align-items-center mb-2 mb-sm-0">
                <small class="text-muted text-headings text-uppercase mr-3 d-none d-sm-block">Sort by</small>
                <a href="{{ route('user.knowledge', ['search' => request()->query('search'), 'sorted_by' => 'newest']) }}"
                    class="sort {{ $sorted_by == 'newest' ? 'desc' : '' }} small text-headings text-uppercase ml-2">Newest</a>

                <a href="{{ route('user.knowledge', ['search' => request()->query('search'), 'sorted_by' => 'popularity']) }}"
                    class="sort {{ $sorted_by == 'popularity' ? 'desc' : '' }} small text-headings text-uppercase ml-2">Popularity</a>
            </div>
        </div>

        <div class="page-separator">
            <div class="page-separator__text">Pengetahuan</div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">

                <div class="row card-group-row">

                    @foreach ($knowledges as $knowledge)
                        <div class="col-md-6 col-lg-4 card-group-row__col">

                            <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                                <img src="https://random.imagecdn.app/1280/720" alt="" class="card-img">
                                <div class="fullbleed bg-primary" style="opacity: .5"></div>
                                <div class="posts-card-popular__content">
                                    <div class="card-body d-flex align-items-center">
                                        <a style="text-decoration: none;" class="d-flex align-items-center"
                                            href=""><i class="material-icons mr-1"
                                                style="font-size: inherit;">remove_red_eye</i>
                                            <small>{{ $knowledge->view_count }}</small></a>
                                    </div>
                                    <div class="posts-card-popular__title card-body">
                                        <small class="text-muted text-uppercase">{{ $knowledge->created_by }}</small>
                                        <a class="card-title"
                                            href="{{ route('user.knowledge.show', ['id' => $knowledge->id]) }}">{{ $knowledge->name }}</a>
                                        <small class="text-muted text-uppercase">{{ \Carbon\Carbon::parse($knowledge->validated_at)->format('j F Y') }}</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach





                </div>
                @if ($knowledges->hasPages())
                    <div class="mb-32pt">
                        {{ $knowledges->appends(['search' => request()->query('search'), 'sorted_by' => request()->query('sorted_by')])->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- // END Page Content -->
@endsection
