<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <!-- User welcome and profile info -->
            <div class="bg-white p-6 shadow-sm rounded-lg flex justify-between items-center mb-6">
                <div class="flex items-center space-x-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-900">Welcome back, {{ Auth::user()->first_name }}</h2>
                        <p class="text-sm text-gray-500">Instructor</p>
                    </div>
                </div>

                <button onclick="confirmNuke()" class="bg-black hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                    Wipe Everything
                </button>
            </div>
            

            <!-- Sections -->
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-900">Sections</h3>
                    <div>
                        <a href="{{ route('sections.create') }}" class="bg-gray-300 text-gray-800 rounded py-2 px-4 mr-2 inline-block">+ ADD SECTION</a>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($sections as $section)
                        <div class="bg-gray-200 p-4 rounded-lg">
                            <div class="flex items-center space-x-2 mb-4">
                                <h4 class="font-semibold">{{ $section->course_name }} {{ $section->section_code }}</h4>
                            </div>
                            <p class="mb-4 text-gray-700">{{ $section->description }}</p>
                            <a href="{{ route('sections.show', $section) }}" class="block bg-black text-white text-center rounded py-2">View Groups</a>
                        </div>
                    @endforeach
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
