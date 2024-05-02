<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            @if (session('success'))
                    <div class="font-medium text-sm text-green-600">
                        {{ session('success') }}
                    </div>
            @endif
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

            <div class="bg-white p-6 shadow-sm rounded-lg mt-6">
                <h3 class="text-2xl font-semibold text-gray-900">To-Do List</h3>
                <div class="mt-4">
                    @forelse ($todos as $todo)
                    <form id="todoForm{{ $todo->id }}" action="{{ route('todos.delete', $todo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-4 p-4 bg-gray-100 rounded border flex justify-between items-center">
                            <div>
                                <h5 class="font-semibold text-lg">{{ $todo->task }}</h5>
                                <p class="text-sm text-gray-700">Assigned to group: <strong>{{ $todo->group->group_name }}</strong></p>
                                <p class="text-sm {{ $todo->completed ? 'text-gray-700' : 'text-red-500' }}"> {{ $todo->completed ? 'Completed' : 'Incomplete' }}</p>
                            </div>
                            <input type="checkbox" name="completed" onchange="handleCheckboxChange(event, {{ $todo->id }})" class="form-checkbox h-6 w-6 text-blue-500" {{ $todo->completed ? 'checked' : '' }}>
                        </div>
                    </form>
                    @empty
                    <p class="text-gray-700">No to-dos found.</p>
                    @endforelse
                </div>
            </div>
            
            
            <div class="mt-4">
                {{ $todos->links() }}
            </div>                   
        </div>
    </div>

    <audio id="successSound">
        <source src="{{ asset('success.mp3') }}" type="audio/mpeg">
    </audio>
    

    <script>
        function confirmNuke() {
            if (confirm('Are you sure you want to delete ALL data except user data from the database? This action CANNOT be undone.')) {
                window.location.href = "{{ route('nuke') }}";
            }
        }

        function handleCheckboxChange(event, todoId) {
        const form = document.getElementById(`todoForm${todoId}`);
        const sound = document.getElementById('successSound');

        sound.playbackRate = 1.0; 
        sound.volume = 0.2;

        if (event.target.checked) {
            form.classList.add('animate__fadeOut'); 

            setTimeout(function() {
                form.submit();
            }, 1000); 

            sound.play();
        }
    }
    </script>
</x-app-layout>
