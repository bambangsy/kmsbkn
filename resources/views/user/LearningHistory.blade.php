@extends('layouts.user')
@section('content')
    <!-- BEFORE Page Content -->

    <!-- // END BEFORE Page Content -->

    <!-- Page Content -->

    


   



    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Alur Belajar</div>
            </div>

            <div class="row card-group-row">

                @foreach ($pathCourses as $pathCourse)
                        <div class="col-md-6 col-lg-4 col-xl-4 card-group-row__col">
                            <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                                data-toggle="popover" data-trigger="click">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded mr-12pt z-0 o-hidden">
                                                    <div class="overlay">
                                                        <img src="https://random.imagecdn.app/1280/720" width="40"
                                                            height="40" alt="Angular" class="rounded">
                                                        <span class="overlay__content overlay__content-transparent">
                                                            <span
                                                                class="overlay__action d-flex flex-column text-center lh-1">
                                                                <small class="h6 small text-white mb-0"
                                                                    style="font-weight: 500;">80%</small>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="{{ route('user.alur-belajar.show', $pathCourse->id) }}"
                                                        class="card-title">{{ $pathCourse->name }}</a>
                                                    <p class="flex text-50 lh-1 mb-0"><small>{{ $pathCourse->name }}
                                                        </small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="student-path.html" data-toggle="tooltip" data-title="Add Favorite"
                                            data-placement="top" data-boundary="window"
                                            class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach




            </div>


        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Pelatihan</div>
            </div>

            <div class="row card-group-row">
                @foreach ($courses as $course)
                        <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">

                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                                data-toggle="popover" data-trigger="click">

                                <a href="{{ route('user.pelatihan.show', $course->id) }}" class="card-img-top js-image"
                                    data-position="" data-height="140">
                                    <img src="https://random.imagecdn.app/1280/720" alt="course">
                                    <span class="overlay__content">
                                        <span class="overlay__action d-flex flex-column text-center">
                                            <i class="material-icons icon-32pt">play_circle_outline</i>
                                            <span class="card-title text-white">Pratinjau</span>
                                        </span>
                                    </span>
                                </a>

                                <div class="card-body flex">
                                    <div class="d-flex flex-column">
                                        <div class="flex">
                                            <a class="card-title"
                                                href="{{ route('user.pelatihan.show', $course->id) }}">{{ $course->name }}</a>
                                            <small class="text-50 font-weight-bold mb-4pt">{{ $course->author }}</small>
                                        </div>
                                        <div class="d-flex align-items-center ">
                                            <div class="rating flex mt-2">
                                                @for ($i = 0; $i < $course->rating; $i++)
                                                    <span class="rating__item"><span
                                                            class="material-icons">star</span></span>
                                                @endfor
                                                @for ($i = $course->rating; $i < 5; $i++)
                                                    <span class="rating__item"><span
                                                            class="material-icons">star_border</span></span>
                                                @endfor
                                                <span>
                                                    <a class="material-icons text-20 cursor:pointer card-course__icon-favorite ml-2"
                                                        style="cursor: pointer;" id="favorite-{{ $course->id }}">
                                                        favorite_border
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-auto d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>6 jam</small></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </div>



    <!-- // END Page Content -->
@endsection
