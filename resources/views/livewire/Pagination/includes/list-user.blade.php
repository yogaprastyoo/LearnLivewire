<div
    class="shadow relative h-[24.5rem] md:h-full rounded-lg w-full p-4 space-y-4 bg-white transition-all duration-1000 ease-in-out">
    <div class="flex flex-col justify-between h-full">
        <div>
            <h1 class="text-2xl font-semibold">User List</h1>
            <p class="text-sm text-gray-600">Our user base is now {{ $users->total() }}.</p>
            <div class="space-y-1">
                <input wire:model.live.debounce.250ms='search' type="text"
                    class="border-b capitalize mt-3 mb-1 border-b-gray-400 outline-none text-sm text-black placeholder:text-black"
                    placeholder="Search..." autocomplete="off">
                @foreach ($users as $user)
                    <p
                        class="capitalize p-2 border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500">
                        {{ $user->name }}
                    </p>
                @endforeach
            </div>
        </div>
        {{ $users->links('livewire::simple') }}
    </div>
</div>
