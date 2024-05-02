<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 mt-5">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl">Create Section</h2>
                <form action="{{ route('sections.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name:</label>
                        <input type="text" id="course_name" name="course_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    
                    <div>
                        <label for="section_code" class="block text-sm font-medium text-gray-700">Section Code:</label>
                        <input type="text" id="section_code" name="section_code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                        <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button class="mt-3">
                            Save Section
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
