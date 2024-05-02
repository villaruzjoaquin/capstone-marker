<x-app-layout>
    <x-slot name="header">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Groups
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 font-medium text-sm text-green-600 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($groups as $group)
                    <div class="overflow-hidden rounded-lg shadow-xl bg-white transition duration-300 ease-in-out hover:shadow-2xl">
                        <div class="px-6 py-4">
                            <h3 class="font-bold text-xl mb-2">{{ $group->group_name }}</h3>
                            <p class="text-gray-700 text-base">{{ $group->description }}</p>
                            <div class="mt-4 mb-4">
                                <h3>Members:</h3>
                                <ul>
                                    @foreach ($group->students as $student)
                                        <li class="text-md" style="color: {{ $student->color_code }};">
                                            {{ $student->first_name }} {{ $student->last_name }}
                                        </li>
                                    @endforeach
                                    <div class="mt-5 text-gray-700"><strong>Comments:</strong> {{ $group->comments }}</div>
                                </ul>

                            </div>
                            
                            <div class="flex space-x-4">
                                <button onclick="editGroup({{ $group->id }})" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition duration-300">Edit</button>
                                <button onclick="deleteGroup({{ $group->id }})" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 transition duration-300">Delete</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <script>
        function editGroup(groupId) {
            window.location.href = `/edit-group/${groupId}`;
        }

        function deleteGroup(groupId) {
        if (confirm('Are you sure you want to delete this group and all its students?')) {
            const overlay = document.createElement('div');
            overlay.style.cssText = 'position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center;';
            overlay.innerHTML = '<div>Deleting... Please wait...</div>';
            document.body.appendChild(overlay);

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/group-has-students/${groupId}`)
            .then(response => response.json())
            .then(data => {
                if (data.hasStudents) {
                return fetch(`/delete-group-with-students/${groupId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });
                } else {
                    return fetch(`/delete-group/${groupId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                alert(data.message);
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to delete the group. Please try again.');
            })
            .finally(() => {
                document.body.removeChild(overlay);
            });
        }
    }
    </script>
</x-app-layout>
