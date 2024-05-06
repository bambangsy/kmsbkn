@extends('layouts.user')
@section('content')
    <div class="mdk-box bg-primary mdk-box--bg-gradient-primary2 js-mdk-box mb-0" data-effects="blend-background">
        <div class="mdk-box__content">
            <div class="hero py-64pt text-center text-sm-left">
                <div class="container page__container">
                    <h1 class="text-white">Angular Fundamentals</h1>
                    <p class="lead text-white-50 measure-hero-lead mb-24pt">Its not every day that one of the most important
                        front-end libraries in web development gets a complete overhaul. Keep your skills relevant and
                        up-to-date with this comprehensive introduction to Googles popular community project.</p>
                    <a href="{{route('user.pelatihan.take_lesson')}}" class="btn btn-white">Resume course</a>
                </div>
            </div>
            <div
                class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
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
        </div>
    </div>

    <div class="container page__container">
        <div class="row">
            <div class="col-lg-7">
                <div class="border-left-2 page-section pl-32pt">

                    <div class="d-flex align-items-center page-num-container">
                        <div class="page-num">1</div>
                        <h4>Getting Started With Angular</h4>
                    </div>

                    <p class="text-70 mb-24pt">Good tools make application development quick*er and easier to maintain than*
                        if you did everything by hand. The goal in this guide is to build and run a simple Angular
                        application in TypeScript, using the Angular CLI while adhering to the Style Guide recommendations
                        that benefit every Angular project.</p>

                    <div class="card mb-32pt mb-lg-64pt">
                        <ul class="accordion accordion--boxed js-accordion mb-0" id="toc-1">
                            <li class="accordion__item open">
                                <a class="accordion__toggle" data-toggle="collapse" data-parent="#toc-1"
                                    href="#toc-content-1">
                                    <span class="flex">1 of 4 Steps</span>
                                    <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                </a>
                                <div class="accordion__menu">
                                    <ul class="list-unstyled collapse show" id="toc-content-1">
                                        <li class="accordion__menu-link">
                                            <span class="material-icons icon-16pt icon--left text-body">check_circle</span>
                                            <a class="flex" href="student-take-lesson.html">Introduction</a>
                                            <span class="text-muted">8m 42s</span>
                                        </li>
                                        <li class="accordion__menu-link">
                                            <span
                                                class="material-icons icon-16pt icon--left text-body">play_circle_outline</span>
                                            <a class="flex" href="student-take-lesson.html">Introduction to TypeScript</a>
                                            <span class="text-muted">50m 13s</span>
                                        </li>
                                        <li class="accordion__menu-link">
                                            <span
                                                class="material-icons icon-16pt icon--left text-body">play_circle_outline</span>
                                            <a class="flex" href="student-take-lesson.html">Comparing Angular to
                                                AngularJS</a>
                                            <span class="text-muted">12m 10s</span>
                                        </li>
                                        <li class="accordion__menu-link">
                                            <span class="material-icons icon-16pt icon--left text-50">hourglass_empty</span>
                                            <a class="flex" href="student-take-quiz.html">Quiz: Getting Started With
                                                Angular</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="d-flex align-items-center page-num-container">
                        <div class="page-num">2</div>
                        <h4>Creating and Communicating Between Angular Components</h4>
                    </div>
                    <p class="text-70 mb-24pt">Data sharing is an essential concept to understand before diving into your
                        first Angular project. In this section, you will learn four different methods for sharing data
                        between Angular components.</p>

                    <div class="card mb-0">
                        <ul class="accordion accordion--boxed js-accordion mb-0" id="toc-2">
                            <li class="accordion__item">
                                <a class="accordion__toggle" data-toggle="collapse" data-parent="#toc-2"
                                    href="#toc-content-2">
                                    <span class="flex">6 Steps</span>
                                    <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                </a>
                                <div class="accordion__menu">
                                    <ul class="list-unstyled collapse" id="toc-content-2">
                                        <li class="accordion__menu-link">
                                            <span class="material-icons icon-16pt icon--left text-body">check_circle</span>
                                            <a class="flex" href="student-take-lesson.html">Introduction</a>
                                            <span class="text-muted">8m 42s</span>
                                        </li>
                                        <li class="accordion__menu-link">
                                            <span
                                                class="material-icons icon-16pt icon--left text-body">play_circle_outline</span>
                                            <a class="flex" href="student-take-lesson.html">Introduction to
                                                TypeScript</a>
                                            <span class="text-muted">50m 13s</span>
                                        </li>
                                        <li class="accordion__menu-link">
                                            <span
                                                class="material-icons icon-16pt icon--left text-body">play_circle_outline</span>
                                            <a class="flex" href="student-take-lesson.html">Comparing Angular to
                                                AngularJS</a>
                                            <span class="text-muted">12m 10s</span>
                                        </li>
                                        <li class="accordion__menu-link">
                                            <span
                                                class="material-icons icon-16pt icon--left text-50">hourglass_empty</span>
                                            <a class="flex" href="student-take-quiz.html">Quiz: Getting Started With
                                                Angular</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-5 page-nav">
                <div class="page-section">
                    <div class="page-nav__content">
                        <div class="page-separator">
                            <div class="page-separator__text">Table of contents</div>
                        </div>
                        <!-- <h4 class="mb-16pt">Table of contents</h4> -->
                    </div>
                    <nav class="nav page-nav__menu">
                        <a class="nav-link active" href="">Getting Started With Angular</a>
                        <a class="nav-link" href="">Creating and Communicating Between Angular Components</a>
                        <a class="nav-link" href="">Exploring the Angular Template Syntax</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section bg-white border-top-2 border-bottom-2">

        <div class="container page__container">
            <div class="row ">
                <div class="col-md-7">
                    <div class="page-separator">
                        <div class="page-separator__text">About this course</div>
                    </div>
                    <p class="text-70">This course will teach you the fundamentals o*f working with Angular 2. You *will
                        learn everything you need to know to create complete applications including: components, services,
                        directives, pipes, routing, HTTP, and even testing.</p>
                    <p class="text-70 mb-0">This course will teach you the fundamentals o*f working with Angular 2. You
                        *will learn everything you need to know to create complete applications including: components,
                        services, directives, pipes, routing, HTTP, and even testing.</p>
                </div>
                <div class="col-md-5">
                    <div class="page-separator">
                        <div class="page-separator__text bg-white">What you’ll learn</div>
                    </div>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center">
                            <span class="material-icons text-50 mr-8pt">check</span>
                            <span class="text-70">Fundamentals of working with Angular</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="material-icons text-50 mr-8pt">check</span>
                            <span class="text-70">Create complete Angular applications</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="material-icons text-50 mr-8pt">check</span>
                            <span class="text-70">Working with the Angular CLI</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="material-icons text-50 mr-8pt">check</span>
                            <span class="text-70">Understanding Dependency Injection</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="material-icons text-50 mr-8pt">check</span>
                            <span class="text-70">Testing with Angular</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    

    <div class="page-section bg-white border-bottom-2">

        <div class="container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Student Feedback</div>
            </div>
            <div class="row mb-32pt">
                <div class="col-md-3 mb-32pt mb-md-0">
                    <div class="display-1">4.7</div>
                    <div class="rating rating-24">
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                    </div>
                    <p class="text-muted mb-0">20 ratings</p>
                </div>
                <div class="col-md-9">

                    <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="75% rated 5/5"
                        data-placement="top">
                        <div class="col-md col-sm-6">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="75"
                                    style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                            <div class="rating">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="16% rated 4/5"
                        data-placement="top">
                        <div class="col-md col-sm-6">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="16"
                                    style="width: 16%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                            <div class="rating">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="12% rated 3/5"
                        data-placement="top">
                        <div class="col-md col-sm-6">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="12"
                                    style="width: 12%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                            <div class="rating">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="9% rated 2/5"
                        data-placement="top">
                        <div class="col-md col-sm-6">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="9"
                                    style="width: 9%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                            <div class="rating">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-8pt" data-toggle="tooltip" data-title="0% rated 0/5"
                        data-placement="top">
                        <div class="col-md col-sm-6">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-auto col-sm-6 d-none d-sm-flex align-items-center">
                            <div class="rating">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="pb-16pt mb-16pt border-bottom row">
                <div class="col-md-3 mb-16pt mb-md-0">
                    <div class="d-flex">
                        <a href="student-profile.html" class="avatar avatar-sm mr-12pt">
                            <!-- <img src="LB" alt="avatar" class="avatar-img rounded-circle"> -->
                            <span class="avatar-title rounded-circle">LB</span>
                        </a>
                        <div class="flex">
                            <p class="small text-muted m-0">2 days ago</p>
                            <a href="student-profile.html" class="card-title">Laza Bogdan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="rating mb-8pt">
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                    </div>
                    <p class="text-70 mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of
                        a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                </div>
            </div>

            <div class="pb-16pt mb-16pt border-bottom row">
                <div class="col-md-3 mb-16pt mb-md-0">
                    <div class="d-flex">
                        <a href="student-profile.html" class="avatar avatar-sm mr-12pt">
                            <!-- <img src="UK" alt="avatar" class="avatar-img rounded-circle"> -->
                            <span class="avatar-title rounded-circle">UK</span>
                        </a>
                        <div class="flex">
                            <p class="small text-muted m-0">2 days ago</p>
                            <a href="student-profile.html" class="card-title">Umberto Klass</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="rating mb-8pt">
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                    </div>
                    <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really
                        expl*ain things clearly I couldn&#39;t be happier, so glad I made this purchase!</p>
                </div>
            </div>

            <div class="pb-16pt mb-24pt row">
                <div class="col-md-3 mb-16pt mb-md-0">
                    <div class="d-flex">
                        <a href="student-profile.html" class="avatar avatar-sm mr-12pt">
                            <!-- <img src="AD" alt="avatar" class="avatar-img rounded-circle"> -->
                            <span class="avatar-title rounded-circle">AD</span>
                        </a>
                        <div class="flex">
                            <p class="small text-muted m-0">2 days ago</p>
                            <a href="student-profile.html" class="card-title">Adrian Demian</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="rating mb-8pt">
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star</span></span>
                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                    </div>
                    <p class="text-70 mb-0">This course is absolutely amazing, Bryan goes* out of his way to really
                        expl*ain things clearly I couldn&#39;t be happier, so glad I made this purchase!</p>
                </div>
            </div>

        </div>

    </div>

@endsection
