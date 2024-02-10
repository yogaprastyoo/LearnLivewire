<x-app-layout>
    @section('title', 'Event')

    {{-- Content --}}
    <div class="max-w-screen-xl h-screen  mx-auto pt-20 lg:px-8 grid grid-cols-7 gap-2">
        {{-- UserList --}}
        <div class="col-span-5 space-y-2 ">
            <livewire:event.user-list lazy search="yoga" />
        </div>

        {{-- FormCreateUser --}}
        <div class="col-span-2">
            @livewire('Event.RegisterForm')
        </div>
    </div>
</x-app-layout>
