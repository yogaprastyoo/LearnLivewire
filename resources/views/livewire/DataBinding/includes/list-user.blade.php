<div>
    {{-- Header --}}
    <header>
        <h1 class="text-2xl font-semibold">List Users</h1>
        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
    </header>

    {{-- UserList --}}
    <div class="space-y-2">
        <div>
            <label class="block text-sm mt-3 font-medium text-gray-700">Name</label>
            @foreach ($users as $user)
                <input id="{{ $user->id }}" value="{{ $user->name }}" disabled
                    class="mt-1 capitalize p-2 border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500"
                    autocomplete="off">
            @endforeach
        </div>
    </div>
</div>
