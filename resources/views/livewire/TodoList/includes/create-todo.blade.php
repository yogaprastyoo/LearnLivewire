<div class="shadow-lg h-fit rounded-lg bg-slate-50 p-4 space-y-4 mb-10">
    <div class="">
        <h1 class="text-2xl font-semibold">Create Todo</h1>
        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
        {{-- @if (session('success'))
            <p class="text-sm text-green-500">{{ session('success') }}</p>
        @endif --}}
    </div>
    <form wire:submit='createNewTodo'>

        <div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Name
                </label>
                <input wire:model.live.debounce.250ms='name' type="text" id="name"
                    class="bg-gray-50 border capitalize border-gray-300 te xt-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Write your name todo here..." autocomplete="off">
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
            <textarea wire:model.live.debounce.250ms='description' id="description" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Write your description todo here..."></textarea>
            @error('description')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <button
            class="py-2 px-5 text-sm mt-5 font-semibold border border-black rounded hover:bg-black hover:text-white transition-all duration-300 focus:bg-black active:bg-black ">Submit</button>
    </form>
</div>
