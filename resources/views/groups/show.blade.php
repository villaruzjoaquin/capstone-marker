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
                    <h3 class="font-semibold text-lg">Students in this Group</h3>
                    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-4">
                        @foreach($students as $student)
                            <!-- Student Card -->
                            <div class="border rounded-lg p-4 flex flex-col justify-between leading-normal"
                                 style="background-color: {{ $student->color_code }}; opacity: 0.7;">
                                <!-- Student Name -->
                                <div class="mb-8">
                                    <p class="text-lg flex items-center" style="color: white;">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </p>
                                </div>
                                <!-- Comments -->
                                @if($student->comments)
                                    <div class="text-base" style="color: white;">
                                        <p><strong>Comments: </strong>{{ $student->comments }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
