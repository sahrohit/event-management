<nav class="w-full flex flex-row justify-around py-4">

    <a href="/" class="flex flex-shrink-0 items-center h-8 w-48">
        <img class="block w-auto lg:hidden" src="logo.svg" alt="Your Company">
        <img class="hidden w-auto lg:block" src="logo.svg" alt="Your Company">
    </a>

    <div class="hidden md:ml-6 md:flex md:space-x-8">
        <a href="/"
            class="inline-flex items-center border-b-2  px-1 pt-1 text-sm font-medium text-gray-900 {{ request()->route()->uri == '/' ? 'border-indigo-500' : 'border-transparent hover:border-gray-300 hover:text-gray-700' }} ">Events</a>
        <a href="/participants"
            class="inline-flex items-center border-b-2  px-1 pt-1 text-sm font-medium text-gray-900 {{ request()->route()->uri == 'participants' ? 'border-indigo-500' : 'border-transparent hover:border-gray-300 hover:text-gray-700' }} ">All
            Participants</a>
    </div>

    {{-- <button type="button"
        class="relative inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path
                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        <span>New Event</span>
    </button> --}}


</nav>
