<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 mt-5">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl">Create Students</h2>
                <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name:</label>
                        <input type="text" id="first_name" name="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="strengths" class="block text-sm font-medium text-gray-700">Strengths:</label>
                        <select id="strengths" name="strengths" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="developer">Developer</option>
                            <option value="designer">Designer</option>
                            <option value="fullstack">Full Stack</option>
                        </select>
                    </div>

                    <div>
                        <label for="comments" class="block text-sm font-medium text-gray-700">Comments:</label>
                        <textarea id="comments" name="comments" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4"></textarea>
                    </div>
                    
                    <div>
                        <label for="group_id" class="block text-sm font-medium text-gray-700">Assign to Group:</label>
                        <select id="group_id" name="group_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button class="mt-3">
                            Save Student
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
