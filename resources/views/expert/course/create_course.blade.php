<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="pb-6">
                        <a href="{{ route('course') }}"
                            class="bg-blue-500 px-5 py-3 rounded-md text-white shadow-sm hover:bg-blue-600">
                            back
                        </a>
                    </div>
                    <h1 class="pb-6 text-3xl">Create Course</h1>
                    <div>
                        <form class="" method="POST" action="{{route("course.store")}}" enctype="multipart/form-data" >
                            @csrf
                            {{-- nama --}}
                            <div class="mb-5">
                                <label for="name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama</label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan nama pengetahuan" required />
                            </div>

                            {{-- deskripsi --}}
                            <div class="mb-5">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Deskripsi</label>
                                <textarea id="description" rows="4" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan deskripsi pengetahuan"></textarea>
                            </div>


                            
                            {{-- upload --}}
                            <div class="mb-5">
                               
                                <button id="button_video" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="showVideo()">Upload Video</button>
                                <button id="button_link" type="button" class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="showLink()">Upload Link</button>
                            </div>
                            <div class="mb-5" id="video" style="display:block;">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="user_avatar">Unggah Video</label>
                                <input name="video"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                            </div>
                            <div class="mb-5" id="link" style="display:none;">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="user_avatar">Masukkan Link Youtube</label>
                                <input type="text" name="link" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg  bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" placeholder="Masukkan link youtube">
                            </div>
                            <script>
                                function showVideo() {
                                    document.getElementById("video").style.display = "block";
                                    document.getElementById("link").style.display = "none";
                                    document.getElementById("button_video").style.backgroundColor = "blue";
                                    document.getElementById("button_link").style.backgroundColor = "gray";
                                }
                                function showLink() {
                                    document.getElementById("video").style.display = "none";
                                    document.getElementById("link").style.display = "block";
                                    document.getElementById("button_video").style.backgroundColor = "gray";
                                    document.getElementById("button_link").style.backgroundColor = "blue";
                                }
                            </script>
                            
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
