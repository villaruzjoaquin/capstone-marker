<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Edit Student
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                

                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                        @csrf
                        @method('PATCH')

                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $student->first_name }}" required autofocus />
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $student->last_name }}" required />
                        </div>

                       <!-- Color Code -->
                        <div class="mt-4">
                            <x-input-label for="color_code" :value="__('Color Code')" />
                            <select id="color_code" name="color_code" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="#FF0000" {{ $student->color_code == '#FF0000' ? 'selected' : '' }}>Developer</option>
                                <option value="#0000FF" {{ $student->color_code == '#0000FF' ? 'selected' : '' }}>Designer</option>
                                <option value="#800080" {{ $student->color_code == '#800080' ? 'selected' : '' }}>Full Stack</option>
                            </select>
                        </div>



                        <!-- Comments -->
                        <div class="mt-4">
                            <x-input-label for="comments" :value="__('Comments')" />
                            <textarea id="comments" name="comments" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $student->comments }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
