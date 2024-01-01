<div>
    {{-- Header --}}
    <header>
        <h1 class="text-2xl font-semibold">Create User</h1>
        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
    </header>

    {{-- FormCreateUser --}}
    <form wire:submit='createNewUser'>
        {{-- NameInput --}}
        <div>
            <label for="nameInput" class="block text-sm mt-3 font-medium text-gray-700">Name</label>
            <input wire:model.blur='name' type="text" id="nameInput" name="nameInput" placeholder="Your name"
                maxlength="60" autocomplete="off"
                class="mt-1 p-2 capitalize border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500">
            @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- EmailInput --}}
        <div>
            <label for="emailInput" class="block text-sm mt-3 font-medium text-gray-700">Email</label>
            <input wire:model.blur='email' id="emailInput" name="emailInput" placeholder="example@comp.com"
                maxlength="254"
                class="mt-1 p-2 lowercase border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500"
                autocomplete="off">
            @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- PasswordInput --}}
        <div class="grid grid-cols-2 gap-2">
            {{-- Password --}}
            <div>
                <label for="passwordInput" class="block text-sm mt-3 font-medium text-gray-700">Password</label>
                <input wire:model.blur='password' type="password" id="passwordInput" name="passwordInput"
                    placeholder="••••••••" maxlength="255"
                    class="mt-1 p-2 border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- PasswordConfirm --}}
            <div>
                <label for="password_confirmationInput" class="block text-sm mt-3 font-medium text-gray-700">Confirm
                    Password</label>
                <input wire:model.live.debounce.250ms='password_confirmation' type="password"
                    id="password_confirmationInput" name="password_confirmationInput" placeholder="••••••••"
                    maxlength="255"
                    class="mt-1 p-2 border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500">
                @error('password_confirmation')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- ImageInput --}}
        <div>
            <label for="upload-{{ $iterationImage }}" class="block text-sm mt-3 font-medium text-gray-700">Image</label>
            <div class="mt-1 flex gap-1 items-center">
                @if ($image)
                    <img class="w-11 h-11 object-cover rounded" src="{{ $image->temporaryUrl() }}" alt="">
                @endif
                <input wire:model.live="image" type="file" id="upload-{{ $iterationImage }}" name="image"
                    accept="image/jpg, image/png, image/jpeg"
                    class=" p-2 border w-full rounded-md border-gray-200 shadow-sm sm:text-sm focus:outline-blue-500"
                    autocomplete="off">
            </div>
            @error('image')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror

            {{-- UploadStatus --}}
            <p wire:loading.delay.longest wire:target='image' class="mt-1 text-xs text-green-600">Uploading Image...</p>
        </div>

        {{-- SendingStatus --}}
        <p wire:loading.delay.longest wire:target='createNewUser' class="mt-1 text-xs text-green-600">
            Sending...
        </p>

        {{-- ButtonSubmit --}}
        <button wire:loading.attr='disabled' wire:loading.class='cursor-not-allowed'
            class="p-2 mt-5 w-full font-semibold border border-black rounded hover:bg-black hover:text-white transition-all duration-300">
            Submit
        </button>
    </form>
</div>
