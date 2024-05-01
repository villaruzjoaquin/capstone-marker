<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" class="rounded">
                    </div>

                    <div>
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" class="rounded">
                    </div>

                    <div>
                        <label for="strengths">Strengths:</label>
                        <select id="strengths" name="strengths" class="rounded">
                            <option value="developer">Developer</option>
                            <option value="designer">Designer</option>
                            <option value="fullstack">Full Stack</option>
                        </select>
                        
                    </div>

                    <div>
                        <label for="comments">Comments:</label>
                        <textarea id="comments" name="comments" class="rounded"></textarea>
                    </div>
                    
                    <div>
                        <label for="group_id">Assign to Group:</label>
                        <select id="group_id" name="group_id" class="rounded">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Save Student
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
