<!-- Start Generation Here -->
@props([
    'imageUrl' => 'https://flowbite.com/docs/images/examples/image-1@2x.jpg',
    'viewUrl' => '#',
    'viewCount' => 0,
    'createdBy' => 'Anonymous',
    'detailUrl' => '#',
    'name' => 'Default Name',
    'validatedAt' => now(),
    'type',
    'rating' => 0,
    'favouriteUrl' => '#',
    'isFavourite' => 0,
    'id' => 0,
    'size' => ''
    
])
<!-- End Generation Here -->
        
@if ($type == 1)
<div class="col-md-6 col-lg-4 card-group-row__col">

    <div class="card card--elevated posts-card-popular overlay card-group-row__card">
        <img src="{{ $imageUrl }}" alt="" class="card-img">
        <div class="fullbleed bg-primary" style="opacity: .5"></div>
        <div class="posts-card-popular__content">
            <div class="card-body d-flex align-items-center">
                <a style="text-decoration: none;" class="d-flex align-items-center"
                    href="{{ $viewUrl }}"><i class="material-icons mr-1"
                        style="font-size: inherit;">remove_red_eye</i>
                    <small>{{ $viewCount }}</small></a>
            </div>
            <div class="posts-card-popular__title card-body">
                <small class="text-muted text-uppercase">{{ $createdBy }}</small>
                <a class="card-title"
                    href="{{ $detailUrl }}">{{ $name }}</a>
                <small class="text-muted text-uppercase">{{ \Carbon\Carbon::parse($validatedAt)->format('j F Y') }}</small>
            </div>
        </div>
    </div>

</div>
@elseif($type==2)
<div class="col-md-6 col-lg-4ho col-xl-4 card-group-row__col">

    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
        data-toggle="popover" data-trigger="click">

        <a href="{{ $detailUrl }}" class="card-img-top js-image"
            data-position="" data-height="140">
            <img src="{{ $imageUrl }}" alt="course">
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
                        href="{{ $detailUrl }}">{{ $name }}</a>
                    
                </div>
                <div>
                    <small class="text-50 font-weight-bold mb-4pt">{{ $createdBy }}</small>
                </div>
                <div class="d-flex align-items-center ">
                    <div class="rating flex mt-2">
                        @for ($i = 0; $i < $rating; $i++)
                            <span class="rating__item"><span
                                    class="material-icons">star</span></span>
                        @endfor
                        @for ($i = $rating; $i < 5; $i++)
                            <span class="rating__item"><span
                                    class="material-icons">star_border</span></span>
                        @endfor
                        <span>
                            
                            <form method="POST" action="{{ $favouriteUrl }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="material-icons text-20 cursor:pointer card-course__icon-favorite ml-2"
                                    style="cursor: pointer;" id="favorite-{{ $name }}" value={{$isFavourite}}>
                                    @if ($isFavourite == 1)
                                        favorite
                                    @else
                                        favorite_border
                                    @endif
                                </button>
                                
                            </form>
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
                <div class="col-auto d-flex align-items-center">
                    <p class="flex text-50 lh-1 mb-0"><small
                            class="text-muted text-uppercase">{{ \Carbon\Carbon::parse($validatedAt)->format('j F Y') }}</small>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@elseif($type==3)
<!-- Start of Selection -->
<div class="col-md-6 col-lg-3 col-xl-3 card-group-row__col">


    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
        data-toggle="popover" data-trigger="click">

        <div class="card-body flex">
            <div class="d-flex flex-column">
                <div class="flex">
                    <a class="card-title"
                        href="{{ $detailUrl }}">{{ $name }}</a>
                    
                </div>
                <div>
                    <small class="text-50 font-weight-bold mb-4pt">{{ $createdBy }}</small>
                </div>
                <div class="d-flex align-items-center ">
                    <div class="rating flex mt-2">
                        <span>
                            <a class="material-icons text-20 cursor:pointer card-course__icon-favorite ml-2"
                                style="cursor: pointer;" id="favorite-{{ $id }}">
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
                <div class="col-auto d-flex align-items-center">
                    <p class="flex text-50 lh-1 mb-0"><small
                            class="text-muted text-uppercase">{{ \Carbon\Carbon::parse($validatedAt)->format('j F Y') }}</small>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endif
