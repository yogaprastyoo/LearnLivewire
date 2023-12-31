<div>
    {{-- Alert --}}
    @if (session('success'))
        <div class="px-4 py-2 rounded w-[55%] sm:w-fit fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-400 ">
            <p class="text-sm font-semibold text-center text-white ">{{ session('success') }}</p>
        </div>
    @endif

    {{-- Content --}}
    <div class="max-w-2xl mx-auto min-h-screen flex justify-center items-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- FormCreateUser --}}
            <div class="shadow h-fit rounded-lg w-full p-4 space-y-4 bg-white">
                @include('livewire.DataBinding.includes.create-user')
            </div>

            {{-- UserList --}}
            <div class="shadow h-fit rounded-lg w-80 p-4 space-y-4 bg-white">
                @include('livewire.DataBinding.includes.list-user')
            </div>
        </div>
    </div>
</div>
