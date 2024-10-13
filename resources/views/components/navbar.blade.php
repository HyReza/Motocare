<header x-data="{ isOpen: false }" :class="{ 'dark': window.matchMedia('(prefers-color-scheme: dark)').matches }"
    class="bg-gray-950 shadow-md dark:bg-gray-900 dark:text-white transition-colors duration-300">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="md:flex md:items-center md:gap-12">
                <img src="images/2.svg" alt="logo" class="h-16">
            </div>

            <div class="hidden md:block">
                <nav aria-label="Global">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="{{ request()->is('/', 'login') ? 'text-orange-500 font-bold dark:text-orange-500 dark:font-bold' : 'text-gray-500 dark:text-gray-300' }}  transition hover:text-orange-500 dark:hover:text-orange-500 ease-in duration-300"
                                href="/"> Home </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('motorcycle', 'motorcycle/*') ? 'text-orange-500 font-bold dark:text-orange-500 dark:font-bold' : 'text-gray-500 dark:text-gray-300' }}  transition hover:text-orange-500 dark:hover:text-orange-500 ease-in duration-300"
                                href="{{ route('motorcycle.index') }}">Motorcycle </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="hidden md:flex sm:gap-4">
                <a class="rounded-md bg-orange-500 hover:bg-orange-600 text-white px-5 md:px-8 lg:px-10 py-2.5 text-sm font-medium shadow dark:bg-orange-600 dark:hover:bg-orange-700 dark:text-gray-200 ease-in duration-300"
                    href="{{ route('motorcycle.create') }}">
                    Add New
                </a>
            </div>

            <div class="block md:hidden">
                <button @click="isOpen = !isOpen"
                    class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-gray-300 dark:hover:text-gray-300/75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="md:hidden bg-gray-950 shadow-lg rounded-lg mt-2 p-4 dark:bg-gray-800">
        <nav aria-label="Global">
            <ul class="flex flex-col items-center gap-4 text-sm">
                <li>
                    <a class="{{ request()->is('/', 'login') ? 'text-orange-500 font-semibold dark:text-orange-600 dark:font-semibold ' : 'text-white dark:text-gray-300' }} transition hover:text-orange-500 dark:text-gray-300 dark:hover:text-orange-700"
                        href="/"> Home </a>
                </li>
                <li>
                    <a class="{{ request()->is('motorcycle') ? 'text-orange-500 font-semibold dark:text-orange-600 dark:font-semibold ' : 'text-white dark:text-gray-300' }} transition hover:text-orange-500 dark:hover:text-orange-700"
                        href="{{ route('motorcycle.index') }}">
                        Motorcycle</a>
                </li>
                <li>
                    <a class="{{ request()->is('motorcycle/create') ? 'text-orange-500 font-semibold dark:text-orange-600 dark:font-semibold ' : 'text-white dark:text-gray-300' }} transition hover:text-orange-500 dark:hover:text-orange-700"
                        href="{{ route('motorcycle.create') }}">
                        Add New</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
