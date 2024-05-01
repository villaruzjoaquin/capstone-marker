<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('groups.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="group_name">Group Name:</label>
                        <input type="text" id="group_name" name="group_name" class="rounded">
                    </div>
                    
                    <!-- Dropdown for selecting a section -->
                    <div>
                        <label for="section_id">Section:</label>
                        <select id="section_id" name="section_id" class="rounded">
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->course_name }} ({{ $section->section_code }})</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Save Group
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
