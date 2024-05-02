<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 mt-5">
            <div class="p-6 bg-white border-b border-gray-200">

                @if (session('success'))
                    <div class="font-medium text-sm text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <h2 class="text-2xl">Create ToDo</h2>
                <form action="{{ route('todos.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="task" class="block text-sm font-medium text-gray-700">Task Name:</label>
                        <input type="text" id="task" name="task" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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
                            Save ToDo
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
