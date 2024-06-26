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
                <h1 class="text-white text-shadow">Alur Belajar</h1>
                <p class="lead measure-hero-lead mx-auto text-white text-shadow ">Halo Sobat BKN, Ingin mengetahui alur
                    belajar hari ini?</p>
                <form action="">
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
            <small class="flex text-muted text-headings text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10
                courses</small>
            <div class="w-auto ml-sm-auto table d-flex align-items-center mb-2 mb-sm-0">
                <small class="text-muted text-headings text-uppercase mr-3 d-none d-sm-block">Sort by</small>

                <a href="{{ route('user.alur-belajar', ['search' => request()->query('search'), 'sorted_by' => 'newest']) }}"
                    class="sort {{ $sorted_by == 'newest' ? 'desc' : '' }} small text-headings text-uppercase ml-2">Newest</a>

                <a href="{{ route('user.alur-belajar', ['search' => request()->query('search'), 'sorted_by' => 'popularity']) }}"
                    class="sort {{ $sorted_by == 'popularity' ? 'desc' : '' }} small text-headings text-uppercase ml-2">Popularity</a>

            </div>
        </div>

        <div class="page-separator">
            <div class="page-separator__text">Alur Belajar</div>
        </div>

        <div class="page-section border-bottom-2">
            <div class="container page__container">
                <div class="row card-group-row">
                    
                    @foreach ($pathCourses as $pathCourse)
                        <x-card 
                        :type=3 
                        :id="$pathCourse->id" 
                        :imageUrl="$pathCourse->imageUrl" 
                        :viewUrl="$pathCourse->viewUrl" 
                        :viewCount="$pathCourse->view_count"
                        :createdBy="$pathCourse->created_by" 
                        :detailUrl="route('user.alur-belajar.show', ['id' => $pathCourse->id])" 
                        :name="$pathCourse->name" 
                        :validatedAt="$pathCourse->validated_at" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- // END Page Content -->
@endsection
