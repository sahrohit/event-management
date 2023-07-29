<div
    class="divide-y divide-gray-200 overflow-hidden  bg-gray-200 shadow sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0 my-16">
    @foreach ($events as $event)
        <div class="relative group bg-white p-6 hover:ring-2 hover:ring-inset hover:ring-indigo-500">
            <div class="mt-8">
                <span
                    class="inline-flex items-center px-3 my-1 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 gap-1">
                    <span class="sr-only">Location</span>
                    <svg class="h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ $event->location }}</span>
                <h3 class="text-lg font-medium">
                    <a href="/{{ $event->id }}" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        {{ $event->title }}

                    </a>
                </h3>
                <p class="mt-2 text-sm text-gray-500">{{ $event->description }}</p>
                <div class="flex-auto">
                    <dl class="mt-2 flex flex-col text-gray-500 xl:flex-row">
                        <div class="flex items-start space-x-3">
                            <dt class="mt-0.5">
                                <span class="sr-only">Date</span>
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                        clip-rule="evenodd" />
                                </svg>
                            </dt>
                            <dd><time datetime="2022-01-10T17:00">{{ $event->time_begin }}</time></dd>
                        </div>
                        <div
                            class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:bord1er-opacity-50 xl:pl-3.5">
                            <dt class="mt-0.5">
                                <span class="sr-only">Date</span>
                                <!-- Heroicon name: mini/calendar -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                        clip-rule="evenodd" />
                                </svg>
                            </dt>
                            <dd><time datetime="2022-01-10T17:00">{{ $event->time_end }}</time></dd>
                        </div>
                    </dl>
                </div>
                <p class="text-right my-4 text-lg">{{ $event->participants->count() }}
                    {{ $event->participants->count() > 1 ? 'participants' : 'participant' }}</p>
            </div>
            <a href="/{{ $event->id }}"
                class="flex flex-row gap-4 pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                aria-hidden="true">
                <span>Register Now</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                </svg>
            </a>

        </div>
    @endforeach

</div>
