<form wire:submit.prevent="submit" class="flex flex-col gap-6 p-12 mb-20 bg-slate-50 rounded-md my-20">

    <div class="flex flex-row w-full justify-between">
        <h1 class="text-3xl">Registering for <span class="font-semibold">{{ $event->title }}</span></h1>
        <h2 class="text-xl">{{ $event->time_begin }} to {{ $event->time_end }}</h2>
    </div>

    <p>{{ $event->description }}</p>


    <div class="flex flex-row w-full justify-between gap-8">
        <div class="w-full">
            <div class="flex flex-row justify-between w-full">

                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                @error('first_name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-1">
                <input type="text" wire:model="first_name" id="first_name"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="John">
            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-row justify-between w-full">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                @error('last_name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-1">
                <input type="text" wire:model="last_name" id="last_name"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="Doe">
            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-row justify-between w-full">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                @error('phone_number')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-1">
                <input type="text" wire:model="phone_number" id="phone_number"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="980-000-0000">
            </div>
        </div>
    </div>



    <div class="flex flex-row w-full justify-between items-end gap-8">
        <div class="w-full">
            <div class="flex flex-row justify-between w-full">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-1">
                <input type="email" wire:model="email" id="email"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="you@example.com">
            </div>
        </div>



        <div class="w-full">
            <div class="flex flex-row justify-between w-full">
                <label for="emergency_contact" class="block text-sm font-medium text-gray-700">Emergency Contact</label>
                @error('emergency_contact')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-1">
                <input type="text" wire:model="emergency_contact" id="emergency_contact"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="980-000-0000">
            </div>
        </div>

    </div>



    <div class="flex flex-row w-full justify-between gap-8 ">
        <div class="w-full">
            <div class="flex flex-row justify-between w-full">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                @error('country')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <select id="country" wire:model="country"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="nepal">Nepal</option>
                <option value="india">India</option>
                <option value="bhutan">Bhutan</option>
                <option value="sri-lanka">Sri Lanka</option>
                <option value="bangladesh">Bangladesh</option>
                <option value="maldives">Maldives</option>
            </select>
        </div>

        <div class="w-full">
            <div class="flex flex-row justify-between w-full">
                <label for="id_type" class="block text-sm font-medium text-gray-700">ID Type</label>
                @error('id_type')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <select id="id_type" wire:model="id_type"
                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="passport">Passport</option>
                <option value="citizenship">Citizenship</option>
                <option value="voter_id">Voter ID</option>
            </select>
        </div>

        <div class="w-full">
            <div class="flex flex-row justify-between w-full">
                <label for="id_number" class="block text-sm font-medium text-gray-700">ID Number</label>
                @error('id_number')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-1">
                <input type="text" wire:model="id_number" id="id_number"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="XX-XX-XX-XXXXX">
            </div>
        </div>
    </div>

    <div class="flex flex-row w-full justify-between items-end gap-8">
        <fieldset class="flex flex-col items-start gap-3 w-full">
            <div class="flex flex-row justify-between w-full">
                <legend class="contents whitespace-nowrap text-base font-medium text-gray-900">Food Preference</legend>
                @error('food_preference')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-row gap-3">
                <div class="flex flex-row w-full items-center">
                    <input id="vegitarian" value="vegitarian" wire:model="food_preference" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="vegitarian" class="ml-3 block text-sm font-medium text-gray-700">Vegitarian</label>
                </div>
                <div class="flex items-center">
                    <input id="vegan" value="vegan" wire:model="food_preference" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="vegan" class="ml-3 block text-sm font-medium text-gray-700">Vegan</label>
                </div>
                <div class="flex items-center">
                    <input id="none" value="none" wire:model="food_preference" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="none" class="ml-3 block text-sm font-medium text-gray-700">None</label>
                </div>
            </div>
        </fieldset>

        <fieldset class="flex flex-col items-start gap-3 w-full">
            <div class="flex flex-row justify-between w-full">
                <legend class="contents whitespace-nowrap text-base font-medium text-gray-900">Room Preference</legend>
                @error('room_preference')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-row gap-3">
                <div class="flex flex-row w-full items-center">
                    <input id="single" value="single" wire:model="room_preference" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="single" class="ml-3 block text-sm font-medium text-gray-700">Single</label>
                </div>
                <div class="flex items-center">
                    <input id="shared" value="shared" wire:model="room_preference" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="shared" class="ml-3 block text-sm font-medium text-gray-700">Shared</label>
                </div>
                <div class="flex items-center">
                    <input id="none" value="none" wire:model="room_preference" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="none" class="ml-3 block text-sm font-medium text-gray-700 whitespace-nowrap">No
                        Room</label>
                </div>
            </div>
        </fieldset>

        <div class="flex items-center gap-3">
            <input type="checkbox" id="require_parking" wire:model="require_parking" namee="require_parking">
            <span id="annual-billing-label">
                <span class="text-sm font-medium text-gray-900 whitespace-nowrap">Is Parking Required?</span>
            </span>
        </div>

        <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex sm:flex-shrink-0 sm:items-center">
            <button type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Submit</button>
        </div>
    </div>


</form>
