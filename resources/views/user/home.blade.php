@extends('layouts.user')
@section('content')
    <!-- BEFORE Page Content -->

    <!-- // END BEFORE Page Content -->

    <!-- Page Content -->   
         

    <div class="mdk-box mdk-box--bg-primary bg-dark js-mdk-box mb-0" data-effects="parallax-background blend-background">
        <div class="mdk-box__bg">
            <div class="mdk-box__bg-front"
                style="background-image: url(https://umsu.ac.id/artikel/wp-content/uploads/2024/02/cara-cek-data-non-asn-dan-cara-daftarnya-di-bkn.jpeg);">
            </div>
        </div>
        <div class="mdk-box__content justify-content-center">
            <div class="hero container page__container text-center py-112pt">
                <h1 class="text-white text-shadow">BKN Learning Hub</h1>
                <p class="lead measure-hero-lead mx-auto text-white text-shadow ">Temukan berbagai materi pembelajaran dari
                    para ahli di bidangnya.
                </p>
                <a href="courses.html" class="btn btn-lg btn-white btn--raised mb-16pt">Cari Pelatihan</a>
            </div>
        </div>
    </div>




    <div class="page-section border-bottom-2">
        <div class="container page__container">

           
            <div class="page-separator">
                <div class="page-separator__text">Pengetahuan</div>
            </div>

            <div class="row card-group-row">

                @foreach ($knowledges as $knowledge)
                        <div class="col-md-6 col-lg-4 card-group-row__col">

                            <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                                <img src="https://flowbite.com/docs/images/examples/image-1@2x.jpg" alt="Default Image" class="card-img">
                                <div class="fullbleed bg-primary" style="opacity: .5"></div>
                                <div class="posts-card-popular__content">
                                    <div class="card-body d-flex align-items-center">
                                        <a style="text-decoration: none;" class="d-flex align-items-center"
                                            href=""><i class="material-icons mr-1"
                                                style="font-size: inherit;">remove_red_eye</i>
                                            <small>{{ $knowledge->view_count }}</small></a>
                                    </div>
                                    <div class="posts-card-popular__title card-body">
                                        <small class="text-muted text-uppercase">{{ $knowledge->name }}</small>
                                        <a class="card-title"
                                            href="{{ route('user.knowledge.show', ['id' => $knowledge->id]) }}">{{ $knowledge->name }}</a>
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
                <div class="page-separator__text">Alur Pelatihan</div>
            </div>
            <div class="row card-group-row">
                @foreach ($pathCourses as $pathCourse)
                        <x-card 
                        :type=3 
                        :id="$pathCourse->id" 
                        :imageUrl="$pathCourse->imageUrl" 
                        :viewUrl="$pathCourse->viewUrl" 
                        :viewCount="$pathCourse->view_count"
                        :createdBy="$pathCourse->user->name" 
                        :detailUrl="route('user.alur-belajar.show', ['id' => $pathCourse->id])" 
                        :name="$pathCourse->name" 
                        :validatedAt="$pathCourse->validated_at" />
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
                        <x-card 
                            :type=2
                            :imageUrl="$course->imageUrl ?? 'https://flowbite.com/docs/images/examples/image-1@2x.jpg'"
                            :viewUrl="route('user.pelatihan.show', $course->id)"
                            :viewCount="$course->view_count"
                            :createdBy="$course->created_by"
                            :detailUrl="route('user.pelatihan.show', $course->id)"
                            :name="$course->name"
                            :validatedAt="$course->validated_at"
                            :rating="$course->rating"
                            :favouriteUrl="route('user.favourite.edit_course', $course->id)"
                            :isFavourite="$course->is_favourite"
                           
                        />
                    @endforeach
                       

                 

            </div>
        </div>
    </div>



    <!-- // END Page Content -->
@endsection
