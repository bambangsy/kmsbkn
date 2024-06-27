@extends('layouts.user')
@section('content')
    <!-- BEFORE Page Content -->

    <!-- // END BEFORE Page Content -->

    <!-- Page Content -->

    



    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Favourite</div>
            </div>

            <div class="row card-group-row">

                @foreach ($pathCourses as $pathCourse)
                      
                        <x-card 
                        :type=3 
                        :id="$pathCourse->id" 
                        :imageUrl="$pathCourse->imageUrl" 
                        :viewUrl="$pathCourse->viewUrl" 
                        :viewCount="$pathCourse->view_count"
                        :createdBy="$pathCourse->user" 
                        :detailUrl="route('user.alur-belajar.show', ['id' => $pathCourse->id])" 
                        :name="$pathCourse->user" 
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
                        
                 @endforeach

            </div>
        </div>
    </div>



    <!-- // END Page Content -->
@endsection
