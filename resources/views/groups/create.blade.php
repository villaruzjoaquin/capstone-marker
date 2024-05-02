<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 mt-5">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl">Create Group</h2>
                <form action="{{ route('groups.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="group_name" class="block text-sm font-medium text-gray-700">Group Name:</label>
                        <input type="text" id="group_name" name="group_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Dropdown for selecting a section -->
                    <div>
                        <label for="section_id" class="block text-sm font-medium text-gray-700">Section:</label>
                        <select id="section_id" name="section_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->course_name }} ({{ $section->section_code }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button class="mt-3">
                            Save Group
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
