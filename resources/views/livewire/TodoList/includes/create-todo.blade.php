<div class="shadow-lg h-fit rounded-lg bg-slate-50 p-4 space-y-4 mb-10">
    {{-- Header --}}
    <header>
        <h1 class="text-2xl font-semibold">Create Todo</h1>
        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
    </header>

    {{-- FormCreateUser --}}
    <form wire:submit='createNewTodo'>
        {{-- NameInput --}}
        <div>
            <label for="name" class="block text-sm mt-3 font-medium text-gray-700">Name</label>
            <input wire:model.live.debounce.250ms='name' type="text" id="name"
                class="mt-1 bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Write your name todo here..." autocomplete="off">
            @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- DescInput --}}
        <div>
            <label for="description" class="block text-sm mt-3 font-medium text-gray-700">Description</label>
            <textarea wire:model.live.debounce.250ms='description' id="description" rows="4"
                class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Write your description todo here..."></textarea>
            @error('description')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- ButtonSubmit --}}
        <button wire:loading.attr='disabled' wire:loading.class='cursor-not-allowed'
            class="py-2 px-5 text-sm mt-5 font-semibold border border-black rounded hover:bg-black hover:text-white transition-all duration-300 focus:bg-black active:bg-black">
            Submit
        </button>
    </form>
</div>
