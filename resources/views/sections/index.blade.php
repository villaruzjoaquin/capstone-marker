<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Sections
        </h2>

        <nav>
            <ul class="flex space-x-4 justify-center">
                <li><a href="{{ route('groups.index') }}" class="text-blue-500 hover:text-blue-800">Groups</a></li>
                <li><a href="{{ route('sections.index') }}" class="text-blue-500 hover:text-blue-800">Sections</a></li>
                <li><a href="{{ route('students.index') }}" class="text-blue-500 hover:text-blue-800">Students</a></li>
            </ul>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <!-- Display Success Messages -->
                @if (session('success'))
                    <div class="font-medium text-sm text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($sections as $section)
                    <div class="overflow-hidden rounded-lg shadow-lg bg-white">
                        <div class="px-6 py-4">
                            <h3 class="font-bold text-xl mb-2">{{ $section->course_name }} - {{ $section->section_code }}</h3>
                            <p class="text-gray-700 text-base">
                                {{ $section->description }}
                            </p>
                            <!-- Edit button -->
                            <div class="text-right">
                                <a href="{{ route('sections.edit', $section) }}" class="text-blue-600 hover:text-blue-900">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
