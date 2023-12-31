<div class="flex flex-col justify-between h-full">
    <div>
        {{-- Header --}}
        <header>
            <h1 class="text-2xl font-semibold">List Users</h1>
            <p class="text-sm text-gray-600">Our user base is now {{ $users->total() }}</p>
        </header>

        {{-- UserList --}}
        <div class="space-y-2">
            {{-- InputSearch --}}
            <input wire:model.live.debounce.250ms='search' type="text" id="search" name="search"
                class="border-b capitalize mt-3 border-b-gray-400 outline-none text-sm text-black placeholder:text-black"
                placeholder="Search..." autocomplete="off">

            {{-- ListUsers --}}
            @foreach ($users as $user)
                <div class="flex gap-1 items-center">
                    {{-- ImageUsers --}}
                    @if (!$user->image == '')
                        <img class="w-10 h-10 rounded shadow object-cover"
                            src="{{ asset('storage/images/profile/' . $user->image) }}" alt="">
                    @else
                        <img class="w-10 h-10 rounded object-cover select-none"
                            src="{{ asset('storage/images/profile/default-user-219873.png') }}" alt="">
                    @endif

                    {{-- NameUsers --}}
                    <p
                        class="capitalize p-2 border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500">
                        {{ $user->name }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Pagination --}}
    {{ $users->links('livewire::simple') }}
</div>
