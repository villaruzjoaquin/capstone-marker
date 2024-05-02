<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Group: {{ $group->group_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-semibold text-2xl">Students in this Group</h3>
                        <a href="{{ route('students.create') }}" class="bg-gray-300 text-gray-800 rounded py-2 px-4 inline-block">+ ADD STUDENT</a>
                    </div>
                    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-4">
                        @foreach($students as $student)
                            <!-- Student Card -->
                            <div class="border border-gray-300 rounded-lg p-4 flex flex-col justify-between leading-normal hover:shadow-lg transition duration-300"
                                 style="background-color: {{ $student->color_code }};">
                                <!-- Student Name -->
                                <div class="mb-4">
                                    <p class="text-lg font-semibold" style="color: {{ $student->text_color ?? 'white' }};">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </p>
                                </div>
                                <!-- Comments -->
                                <p class="mb-4" style="color: {{ $student->text_color ?? 'white' }};">
                                    <strong>Comments:</strong> {{ $student->comments ? $student->comments : 'No comments available' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
