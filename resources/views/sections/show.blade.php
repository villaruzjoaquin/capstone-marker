<x-app-layout>
    <!-- Header setup -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $section->course_name }} - {{ $section->section_code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Group cards header -->
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-900">Groups</h3>
                    <div>
                        <a href="{{ route('groups.create') }}" class="bg-gray-300 text-gray-800 rounded py-2 px-4 mr-2 inline-block">+ ADD GROUP</a>
                    </div>
                </div>
                <!-- Group cards grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($groups as $group)
                        <div class="bg-gray-200 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-semibold">{{ $group->group_name }}</h4>
                            </div>
                            <p class="mb-4 text-gray-700">
                                {{ $group->comments ? $group->comments : 'No comments available' }}
                            </p>
                            <a href="{{ route('groups.show', $group) }}" class="block bg-black text-white text-center rounded py-2">View Members</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
