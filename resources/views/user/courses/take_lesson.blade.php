@extends('layouts.user')
@section('content')
    <!-- Page Content -->

    <div class="navbar navbar-light border-0 navbar-expand-sm" style="white-space: nowrap;">
        <div class="container page__container flex-column flex-sm-row">
            <nav class="nav navbar-nav">
                <div class="nav-item py-16pt py-sm-0">
                    <div class="media flex-nowrap">
                        <div class="media-left mr-16pt">
                            <a href="student-take-course.html"><img src="{{ asset('profile.png') }}" width="40"
                                    alt="Angular" class="rounded"></a>
                        </div>
                        <div class="media-body d-flex flex-column">
                            <a href="student-take-course.html" class="card-title">Angular Fundamentals</a>
                            <div class="d-flex">
                                <span class="text-50 small font-weight-bold mr-8pt">Elijah Murray</span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </div>
    <div class="bg-primary pb-lg-64pt py-32pt">
        <div class="container page__container">
            {{-- <nav class="course-nav">
       <a data-toggle="tooltip"
          data-placement="bottom"
          data-title="Getting Started with Angular: Introduction"
          href=""><span class="material-icons">check_circle</span></a>
       <a data-toggle="tooltip"
          data-placement="bottom"
          data-title="Getting Started with Angular: Introduction to TypeScript"
          href=""><span class="material-icons text-primary">account_circle</span></a>
       <a data-toggle="tooltip"
          data-placement="bottom"
          data-title="Getting Started with Angular: Comparing Angular to AngularJS"
          href=""><span class="material-icons">play_circle_outline</span></a>
       <a data-toggle="tooltip"
          data-placement="bottom"
          data-title="Quiz: Getting Started with Angular"
          href="student-take-quiz.html"><span class="material-icons">hourglass_empty</span></a>
   </nav> --}}
            <div class="js-player bg-primary embed-responsive embed-responsive-16by9 mb-32pt mt-32pt">
                <div class="player embed-responsive-item">
                    <div class="player__content">
                        <div class="player__image" style="--player-image: url(public/images/illustration/player.svg)"></div>
                        <a href="javascript:void(0)" class="player__play bg-primary">
                            <span class="material-icons">play_arrow</span>
                        </a>
                    </div>
                    <div class="player__embed">
                        <video class="embed-responsive-item" controls controlsList="nodownload">
                            <source
                                src="{{ asset('storage/' . $course->file) }}"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap align-items-end mb-16pt">
                <h1 class="text-white text-4xl flex m-0">Introduction to TypeScript</h1>
                <p class="h1 text-white-50 font-weight-light m-0">50:13</p>
            </div>

            <p class="hero__lead measure-hero-lead text-white-50 mb-24pt">JavaScript is now used to power backends, create
                hybrid mobile applications, architect cloud solutions, design neural networks and even control robots. Enter
                TypeScript: a superset of JavaScript for scalable, secure, performant and feature-rich applications.</p>

        </div>
    </div>
    <div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
        <div class="container page__container">
            <ul class="nav navbar-nav flex align-items-sm-center">
                <li class="nav-item navbar-list__item">
                    <div class="media align-items-center">
                        <span class="media-left mr-16pt">
                            <img src="../../public/images/people/50/guy-6.jpg" width="40" alt="avatar"
                                class="rounded-circle">
                        </span>
                        <div class="media-body">
                            <a class="card-title m-0" href="teacher-profile.html">Eddie Bryan</a>
                            <p class="text-50 lh-1 mb-0">Instructor</p>
                        </div>
                    </div>
                </li>
                <li class="nav-item navbar-list__item">
                    <i class="material-icons text-muted icon--left">schedule</i>
                    2h 46m
                </li>
                <li class="nav-item navbar-list__item">
                    <i class="material-icons text-muted icon--left">assessment</i>
                    Beginner
                </li>
                <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                    <div class="rating rating-24">
                        <div class="rating__item"><i class="material-icons">star</i></div>
                        <div class="rating__item"><i class="material-icons">star</i></div>
                        <div class="rating__item"><i class="material-icons">star</i></div>
                        <div class="rating__item"><i class="material-icons">star</i></div>
                        <div class="rating__item"><i class="material-icons">star_border</i></div>
                    </div>
                    <p class="lh-1 mb-0"><small class="text-muted">20 ratings</small></p>
                </li>
            </ul>
        </div>
    </div>

    <div class="page-section">
        <div class="container page__container">

            <div class="d-flex align-items-center mb-heading">
                <h4 class="m-0">Discussions</h4>
                <a href="discussions-ask.html" class="text-underline ml-auto">Ask a Question</a>
            </div>

            <div class="border-top">

                <div class="list-group list-group-flush">

                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-3 mb-8pt mb-md-0">
                                <div class="media align-items-center">
                                    <div class="media-left mr-12pt">
                                        <a href="" class="avatar avatar-sm">
                                            <!-- <img src="../../LB" alt="avatar" class="avatar-img rounded-circle"> -->
                                            <span class="avatar-title rounded-circle">LB</span>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column media-body media-middle">
                                        <a href="" class="card-title">Laza Bogdan</a>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <p class="mb-8pt"><a href="discussion.html" class="text-body"><strong>Using Angular
                                            HttpClientModule instead of HttpModule</strong></a></p>

                                <a href="discussion.html" class="chip chip-outline-secondary">Angular fundamentals</a>

                            </div>
                            <div class="col-auto d-flex flex-column align-items-center justify-content-center">
                                <h5 class="m-0">1</h5>
                                <p class="lh-1 mb-0"><small class="text-70">answers</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-3 mb-8pt mb-md-0">
                                <div class="media align-items-center">
                                    <div class="media-left mr-12pt">
                                        <a href="" class="avatar avatar-sm">
                                            <!-- <img src="../../AC" alt="avatar" class="avatar-img rounded-circle"> -->
                                            <span class="avatar-title rounded-circle">AC</span>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column media-body media-middle">
                                        <a href="" class="card-title">Adam Curtis</a>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <p class="mb-0"><a href="discussion.html" class="text-body"><strong>Why am I getting an
                                            error when trying to install angular/http@2.4.2</strong></a></p>

                            </div>
                            <div class="col-auto d-flex flex-column align-items-center justify-content-center">
                                <h5 class="m-0">1</h5>
                                <p class="lh-1 mb-0"><small class="text-70">answers</small></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <a href="discussions.html" class="btn btn-outline-secondary">See all discussions for this lesson</a>

        </div>
    </div>

    <!-- // END Page Content -->
@endsection
