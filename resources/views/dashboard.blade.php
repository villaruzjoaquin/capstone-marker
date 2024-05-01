<x-app-layout>

    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }
        .flex-item {
            flex: 1 1 200px;
            border: 1px solid #ccc;
            padding: 16px;
            margin: 3px;
            border-radius: 8px;
        }
    </style>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="p-6 text-gray-900 flex-grow">
                    <p>Welcome, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                </div>

                <button onclick="confirmNuke()" class="bg-black hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                    Nuke Everything
                </button>

                <div class="p-6">
                    <a href="{{ route('groups.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Group
                    </a>

                    <a href="{{ route('sections.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Create Section
                    </a>

                    <a href="{{ route('students.create') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Create Student
                    </a>
                </div>
            </div>

            @if (session('success'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">Sections</h3>
                        <div class="flex-container">
                            @foreach($sections as $section)
                                <a href="{{ route('sections.show', $section) }}" class="flex-item bg-white border rounded-lg p-4 hover:shadow-lg transition duration-300">
                                    <strong>Course Name:</strong> {{ $section->course_name }}
                                    <br>
                                    <strong>Section Code:</strong> {{ $section->section_code }}
                                    <br>
                                    <strong>Description:</strong> {{ $section->description }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                
        </div>
    </div>
    <script>
        function confirmNuke() {
            if (confirm('Are you sure you want to delete ALL data except user data from the database? This action CANNOT be undone.')) {
                window.location.href = "{{ route('nuke') }}";
            }
        }
    </script>
</x-app-layout>
