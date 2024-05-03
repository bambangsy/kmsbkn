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
                    <h1 class="pb-6 text-3xl">Show Path</h1>
                    <div>


                       
                        <div class="mb-5">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama</label>
                            <select id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="" disabled selected>Pilih kursus</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <form class="" method="POST" action="{{ route('course_path.store_items', $path->id) }}"
                            >
                            @csrf
                            {{-- nama --}}
                            
                            <table id="table" class="mb-4 w-full border-collapse border border-gray-300 dark:border-gray-600">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-300 dark:border-gray-600 p-2">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($courses_list->isNotEmpty())
                                        @foreach($courses_list as $course)
                                            <tr>
                                                <td class="border border-gray-300 dark:border-gray-600 p-2">
                                                    <a href="{{ asset('storage/' . $course->file) }}" target="_blank">{{ $course->name }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <!-- Table content will be dynamically generated here -->
                                </tbody>
                            </table>
                            <input type="hidden" name="items" id="items" value="">
                            <button 
                                onclick="addValueToTable();"
                                type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Add</button>
                            <button 
                                onclick="sendItemsRequest();"
                                type="submit"
                                class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Submit</button>
                        </form>
                    <script>
                        
                        let items = [];
                        function addValueToTable() {
                            // Tambahkan nama kursus ke dalam tabel dan id ke dalam items
                            const table = document.getElementById('table');
                            const row = table.insertRow();
                            const cell1 = row.insertCell(0);
                            const courseId = document.getElementById('name').value;
                            const courseName = document.getElementById('name').selectedOptions[0].text;
                            items.push(courseId);
                            cell1.innerHTML = courseName;
                
                        }
                        
                        function sendItemsRequest() {
                            document.getElementById('items').value = JSON.stringify(items);
                        }
                    </script>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
