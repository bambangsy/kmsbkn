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
                <h1 class="text-white text-shadow">Pelatihan</h1>
                <p class="lead measure-hero-lead mx-auto text-white text-shadow ">Halo Sobat BKN, Ingin mempelajari apa hari
                    ini?</p>
                <form action="">
                    <div class="relative">
                        <div class="flex flex-col md:flex-row">
                            <input type="search"
                                class="relative m-0 block w-full rounded border border-solid border-neutral-200 bg-white bg-clip-padding px-3 py-[1rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-blue-500 focus:z-[3] focus:border-primary  focus:shadow-inset focus:outline-none opacity-70"
                                placeholder="Search" aria-label="Search" id="exampleFormControlInput4" />
                            <button class="px-3 btn btn-white text-primary mt-0 md:mt-2 ">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container page__container">

        <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-24pt" style="white-space: nowrap;">
            <small class="flex text-muted text-headings text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10
                courses</small>
            <div class="w-auto ml-sm-auto table d-flex align-items-center mb-2 mb-sm-0">
                <small class="text-muted text-headings text-uppercase mr-3 d-none d-sm-block">Sort by</small>
                <a href="{{ route('user.pelatihan', ['search' => request()->query('search'), 'sorted_by' => 'newest']) }}"
                    class="sort {{ $sorted_by == 'newest' ? 'desc' : '' }} small text-headings text-uppercase ml-2">Newest</a>

                <a href="{{ route('user.pelatihan', ['search' => request()->query('search'), 'sorted_by' => 'popularity']) }}"
                    class="sort {{ $sorted_by == 'popularity' ? 'desc' : '' }} small text-headings text-uppercase ml-2">Popularity</a>

            </div>
        </div>

        <div class="page-separator">
            <div class="page-separator__text">Pelatihan</div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">

                <div class="row card-group-row">

                    @for ($i = 0; $i < 12; $i++)
                        <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">

                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                                data-toggle="popover" data-trigger="click">

                                <a href="student-course.html" class="card-img-top js-image" data-position=""
                                    data-height="140">
                                    <img src="https://random.imagecdn.app/1280/720" alt="course">
                                    <span class="overlay__content">
                                        <span class="overlay__action d-flex flex-column text-center">
                                            <i class="material-icons icon-32pt">play_circle_outline</i>
                                            <span class="card-title text-white">Pratinjau</span>
                                        </span>
                                    </span>
                                </a>

                                <div class="card-body flex">
                                    <div class="d-flex">
                                        <div class="flex">
                                            <a class="card-title" href="student-course.html">Microlearning</a>
                                            <small class="text-50 font-weight-bold mb-4pt">Raden Bambang</small>
                                        </div>
                                        <a href="student-course.html" data-toggle="tooltip" data-title="Add Favorite"
                                            data-placement="top" data-boundary="window"
                                            class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="rating flex">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                        <!-- <small class="text-50">6 hours</small> -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>6 jam</small></p>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>12 pelajaran</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor





                </div>
            </div>
        </div>
    </div>
    <!-- // END Page Content -->
@endsection
