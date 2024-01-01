<div>
    {{-- Alert --}}
    @if (session('success'))
        <div
            class="px-4 z-50 py-2 text-white font-semibold rounded fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-400">
            <p class=" text-sm">{{ session('success') }}</p>
        </div>
    @endif
    @if (session('successDelete'))
        <div
            class="px-4 z-50 py-2 text-white font-semibold rounded fixed top-4 left-1/2 transform -translate-x-1/2 bg-red-400">
            <p class=" text-sm">{{ session('successDelete') }}</p>
        </div>
    @endif

    {{-- Content --}}
    <div class="max-w-screen-xl mx-auto pt-20 grid grid-cols-6 gap-8">
        {{-- TodoList --}}
        <div class="col-span-4">
            @include('livewire.TodoList.includes.list-todo')
        </div>
        {{-- FormCreateTodo --}}
        <div class="col-span-2">
            @include('livewire.TodoList.includes.create-todo')
        </div>
    </div>
</div>
