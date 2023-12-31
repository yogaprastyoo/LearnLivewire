<div>
    <button wire:click='handleClick' class="bg-gray-800 text-white px-4 py-2">Click me</button>
    <h1 class="mt-3">Total Users : {{ count($users) }}</h1>
    <button wire:click='createNewUser' class="bg-blue-800 text-white px-4 py-2">Add user</button>
</div>
