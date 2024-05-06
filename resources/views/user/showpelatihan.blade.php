
@extends('layouts.user')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Back</a>
            </div>
        </div>
        @if($course)
            
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if($course->source_id == 1)
                            <video src="{{ asset('storage/' . $course->file) }}" type="video/mp4" width="100%" height="600px" id="knowledge-iframe" controls>

                            </video>
                            @elseif($course->source_id == 2)
                                <iframe width="100%" height="600px" src="https://www.youtube.com/embed/{{$course->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                
                            @endif
                            {{-- <script>
                                const iframe = document.getElementById('knowledge-iframe');
                                const video = iframe.contentWindow.document.querySelector('video');
                                console.log(video);
                                if (video) {
                                    video.addEventListener('loadedmetadata', () => {
                                        var duration = video.duration;
                                        finished_duration = duration - 10;
                                        console.log('Duration:', duration);
                                        console.log('Finished duration:', finished_duration);
                                        setInterval(() => {
                                            const currentTime = video.currentTime;
                                            console.log('Current Time:', currentTime);
                                            
                                            if (currentTime >= finished_duration) {
                                                console.log('done bitch');
                                                // Add your code here to indicate completion    
                                                // For example, you could send an AJAX request to the server
                                                // or display a message to the user.
                                            }
                                        }, 2000);
                                    });
                                } else {
                                    console.log('Video element not found in iframe.');
                                }
                            </script> --}}
                            <h1 class="card-title my-3">{{ $course->name }}</h1>
                            <p class="card-text">{{ $course->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Pengetahuan tidak ditemukan atau telah dihapus.
            </div>
        @endif
    </div>
@endsection
