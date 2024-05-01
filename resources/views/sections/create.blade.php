<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('sections.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="course_name">Course Name:</label>
                        <input type="text" id="course_name" name="course_name" class="rounded">
                    </div>
                    
                    <div>
                        <label for="section_code">Section Code:</label>
                        <input type="text" id="section_code" name="section_code" class="rounded">
                    </div>

                    <div>
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="rounded"></textarea>
                    </div>

                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Save Section
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
