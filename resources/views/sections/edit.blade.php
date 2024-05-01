<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Edit Section
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('sections.update', $section) }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Course Name -->
                        <div>
                            <x-input-label for="course_name" :value="__('Course Name')" />
                            <x-text-input id="course_name" class="block mt-1 w-full" type="text" name="course_name" value="{{ $section->course_name }}" required autofocus />
                        </div>

                        <!-- Section Code -->
                        <div class="mt-4">
                            <x-input-label for="section_code" :value="__('Section Code')" />
                            <x-text-input id="section_code" class="block mt-1 w-full" type="text" name="section_code" value="{{ $section->section_code }}" required />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ $section->description }}</textarea>
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
