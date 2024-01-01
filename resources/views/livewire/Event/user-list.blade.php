<div class="bg-white p-3 rounded-xl shadow-md">
    {{-- Header --}}
    <header class="bg-white p-3 grid grid-cols-3 items-end rounded-xl shadow-md">
        {{-- HeaderTitle --}}
        <div>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">List Users.</h2>
            <p class="mt-2 leading-8 text-gray-600">Our user base is now {{ $users->total() }}.
            </p>
        </div>

        {{-- InputSearch --}}
        <input wire:model.live.debounce.1000ms='search' type="text"
            class="bg-gray-50 capitalize h-fit w-64 p-2.5 backdrop-blur border border-white/50 text-gray-900 text-sm rounded-lg outline-none block"
            placeholder="Search..." autocomplete="off">

        {{-- ReloadButton --}}
        <div class="flex justify-end">
            <div role="reloadButton" @click="$dispatch('user-created')" wire:loading.remove>
                <svg aria-hidden="true"
                    class="w-4 h-4 text-gray-200 cursor-pointer dark:text-gray-600 fill-black hover:rotate-45 transition-all duration-300"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z" />
                </svg>
            </div>
            <div role="status" wire:loading>
                <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-black"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
            </div>
        </div>
    </header>

    {{-- ListUsers --}}
    <div>
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($users as $user)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        {{-- ImageUsers --}}
                        @if (!$user->image == '')
                            <img class="h-12 w-12 flex-none object-cover rounded-full bg-gray-50"
                                src="{{ asset('storage/images/profile/' . $user->image) }}" alt="">
                        @else
                            <img class="h-12 w-12 flex-none object-cover rounded-full bg-gray-50"
                                src="{{ asset('storage/images/profile/default-user-219873.png') }}" alt="">
                        @endif

                        <div class="min-w-0 flex-auto">
                            {{-- NameUsers --}}
                            <p class="text-sm capitalize font-semibold leading-6 text-gray-900">
                                {{ $user->name }}
                            </p>

                            {{-- EmailUsers --}}
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        {{-- RoleUsers --}}
                        <p class="text-sm leading-6 text-gray-900">
                            Co-Founder / CEO
                        </p>

                        {{-- DateCreatedUsers --}}
                        <p class="mt-1 text-xs leading-5 text-gray-500">
                            {{ date($user->created_at) }}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- Pagination --}}
        {{ $users->links() }}
    </div>
</div>
