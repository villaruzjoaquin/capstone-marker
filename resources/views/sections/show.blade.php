<x-app-layout>
    <!-- Styles and header setup -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $section->course_name }} - {{ $section->section_code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                @foreach($groups as $group)
                <a href="{{ route('groups.show', $group) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition duration-300">
                    <div class="p-4">
                        <div class="font-bold text-xl mb-2">{{ $group->group_name }}</div>
                        <div class="text-gray-700"><strong>Comments:</strong> {{ $group->comments }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
