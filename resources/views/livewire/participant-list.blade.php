<div>
    @isset($event)
        <div class="border-b border-gray-200 pb-5">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Participants for {{ $event->title }}</h3>
            <p class="mt-2 max-w-4xl text-sm text-gray-500">All the participants registerd for <strong>
                    {{ $event->title }}</strong> are listed
                below, sorted by their registration time.</p>
        </div>
    @endisset

    <div class="my-8">
        {{ $participants->links() }}
    </div>

    @if (!!$participants)
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900 px-6 sm:px-8">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Email</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Phone Number</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        ID Type</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        ID Number</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Country</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Room Preference</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Food Restrictions</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Require Parking</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($participants as $participant)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 px-6 sm:px-8">
                                            {{ $participant->first_name }} {{ $participant->last_name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $participant->email }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $participant->phone_number }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ ucfirst($participant->id_type) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $participant->id_number }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ ucfirst($participant->country) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ ucfirst($participant->room_preference) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ ucfirst($participant->food_preference) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $participant->require_parking == 1 ? 'Yes' : 'No' }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="/result?id={{ $participant->event_id }}&participant_id={{ $participant->id }}&pnr={{ $participant->pnr }}"
                                                class="text-indigo-600 hover:text-indigo-900">View<span
                                                    class="sr-only">, {{ $participant->first_name }}
                                                    {{ $participant->last_name }}</span></a>
                                            <button class="text-indigo-600 hover:text-indigo-900"
                                                wire:click="delete({{ $participant->id }})">Delete</button>
                                            <a href="/edit?participant_id={{ $participant->id }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div>
            <h1 class="text-center w-full text-lg font-semibold my-20">⚠️ No Participants Found</h1>
        </div>

    @endif
</div>
