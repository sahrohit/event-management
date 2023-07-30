<div class="bg-white">
    <main class="mx-auto w-full max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-xl py-16 sm:py-24">
            <div class="text-center">
                <p class="text-base font-semibold text-indigo-600">{{ $event->title }}</p>
                <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Successfully Registered
                </h1>
                <p class="text-left mt-2 text-lg text-gray-500">We cordially invite <span
                        class="font-bold">{{ $participant->first_name }}
                        {{ $participant->last_name }}</span> to attend <span
                        class="font-bold">{{ $event->title }}</span>. Your ticket number is <span
                        class="font-bold">{{ $participant->pnr }}</span>.</p>

                <p class="text-left mt-2 text-lg text-gray-500">Please be at the venue half an hour before the starting
                    time of the event.</p>

                <p class="text-left mt-2 text-lg text-gray-500">Thank you,<br /> Takshak Team.</p>
            </div>
            <div class="mt-12 flex flex-row w-full gap-4 justify-between">
                <div class="">
                    <img class="h-40 w-40"
                        src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={pnr:'{{ $queryParams->pnr }}'}" />
                    <p class="w-40 text-2xl text-center">{{ $queryParams->pnr }}</p>
                </div>


                <div class="flex flex-col gap-2 grow items-end justify-between">
                    <div class="flex flex-row gap-2 justify-between w-full">
                        <div class="text-left">
                            <p class="text-lg ">Start Time</p>
                            <p class="text-xl font-semibold">{{ $event->time_begin }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg ">End Time</p>
                            <p class="text-xl font-semibold">{{ $event->time_end }}</p>
                        </div>
                    </div>

                    <p class="text-base font-medium">
                        Please bring your ticket with a registered Id Card for the event. You can also show the QR code
                        to the event.
                    </p>

                </div>



            </div>
            <div class="mt-8 flex flex-row justify-center gap-6">
                <a href="/" class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    Go Home
                </a>
                <a href="/{{ $event->id }}" class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    Register Another Participant
                </a>
                <a href="#" class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    View All Participant
                </a>
            </div>
    </main>

</div>
