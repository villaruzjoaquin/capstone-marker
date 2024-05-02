<div x-data="{ open: false }" class="flex">

    <!-- Hamburger Icon for Mobile -->
    <button @click="open = !open" class="md:hidden p-4 z-30">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:block md:w-64 bg-gray-800 text-white fixed h-full z-20">
        <!-- Sidebar content here -->
        <div class="px-4 py-6">
            <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-white">Memohub</a>
        </div>
        <ul class="flex flex-col space-y-2 p-2">
            <!-- Sidebar items with add buttons -->
            <li class="flex justify-between items-center">
                <a href="{{ route('groups.index') }}" class="block py-2 px-4 hover:bg-gray-700 flex-grow">Group</a>
                <a href="{{ route('groups.create') }}" class="text-lg font-bold py-2 px-4 hover:bg-gray-700 text-white-800">+</a>
            </li>
            <li class="flex justify-between items-center">
                <a href="{{ route('sections.index') }}" class="block py-2 px-4 hover:bg-gray-700 flex-grow">Section</a>
                <a href="{{ route('sections.create') }}" class="text-lg font-bold py-2 px-4 hover:bg-gray-700 text-white-800">+</a>
            </li>
            <li class="flex justify-between items-center">
                <a href="{{ route('students.index') }}" class="block py-2 px-4 hover:bg-gray-700 flex-grow">Student</a>
                <a href="{{ route('students.create') }}" class="text-lg font-bold py-2 px-4 hover:bg-gray-700 text-white-800">+</a>
            </li>
        </ul>
        
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block py-5 px-4 hover:bg-gray-700 text-white w-full text-left">Logout</button>
            </form>
        </div>
        
    </div>
</div>
