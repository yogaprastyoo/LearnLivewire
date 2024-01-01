 <div class="space-y-8">
     {{-- Header --}}
     <header class="flex px-5 pt-1 justify-between items-end">
         {{-- HeaderTitle --}}
         <div>
             <h1 class="text-2xl font-semibold">Todo List</h1>
             <p class="text-sm text-gray-600">You have {{ count($todos) }} to-do lists</p>
             <p class="text-sm text-gray-600">{{ $search }}</p>
         </div>

         {{-- InputSearch --}}
         <div>
             <input wire:model.live.debounce.250ms='search' type="text"
                 class="bg-white/30 backdrop-blur border border-white/50 text-gray-900 text-sm rounded-lg outline-none block w-full p-2.5"
                 placeholder="Search..." autocomplete="off">
         </div>
     </header>

     {{-- ListTodos --}}
     <div class="space-y-8 px-5 pb-10 pt-1 overflow-x-scroll h-[80vh]">
         <div class="sm:columns-2 sm:gap-6 lg:columns-2 lg:gap-5">
             {{-- CardTodo --}}
             @foreach ($todos as $todo)
                 <div class="mb-5 sm:break-inside-avoid">
                     <div class="rounded-xl mb-5 hover:bg-slate-50 bg-white p-4 ring ring-indigo-50 sm:p-6 lg:p-8">
                         {{-- CardHeader --}}
                         <div class="flex justify-between">
                             {{-- TodoStatus --}}
                             @if ($todo->complated)
                                 <strong
                                     class="rounded select-none border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
                                     Finished
                                 </strong>
                             @else
                                 <strong
                                     class="rounded select-none border border-red-500 bg-red-500 px-3 py-1.5 text-[10px] font-medium text-white">
                                     Incomplete
                                 </strong>
                             @endif

                             {{-- ButtonEdit&Delete --}}
                             <div>
                                 <button wire:click='edit({{ $todo->id }})'
                                     class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                 <button wire:click='delete({{ $todo->id }})'
                                     class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>

                             </div>
                         </div>

                         {{-- CardBody --}}
                         @if ($editingTodoId === $todo->id)
                             {{-- FormEditTodo --}}
                             <div class="mt-5">
                                 <div class="mb-5">
                                     <label for="editingName" class="block mb-2 text-sm font-medium text-gray-900 ">
                                         Name
                                     </label>
                                     <input wire:model='editingName' type="text" id="editingName"
                                         class="bg-gray-50 border capitalize border-gray-300 te xt-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                         placeholder="Write your name todo here..." autocomplete="off">
                                     @error('editingName')
                                         <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                     @enderror
                                 </div>
                             </div>
                             <div>
                                 <label for="editingDesc"
                                     class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                 <textarea wire:model='editingDesc' id="editingDesc" rows="4"
                                     class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Write your description todo here..."></textarea>
                                 @error('editingDesc')
                                     <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>
                         @else
                             {{-- TodoName --}}
                             <h3 class="mt-4 w-fit text-lg h-fit capitalize font-medium hover:underline sm:text-xl">
                                 {{ $todo->name }}
                             </h3>

                             {{-- TodoDesc --}}
                             <p class="mt-1 text-sm text-gray-700">
                                 {{ $todo->description }}
                             </p>
                         @endif

                         {{-- CardFoter --}}
                         @if ($editingTodoId === $todo->id)
                             {{-- ButtonUpdateTodo --}}
                             <div class="mt-4">
                                 <button wire:click='update'
                                     class="py-2 px-5 text-sm font-semibold border rounded bg-blue-600 text-white hover:bg-blue-700 transition-all duration-300 focus:bg-blue-800 active:bg-blue-800 ">Update</button>
                                 <button wire:click='cancelUpdate'
                                     class="py-2 px-5 text-sm font-semibold border rounded bg-red-600 text-white hover:bg-red-700 transition-all duration-300 focus:bg-red-800 active:bg-red-800 ">Cancel</button>
                             </div>
                         @else
                             <div class="mt-4 justify-between sm:flex sm:items-center sm:gap-2">
                                 {{-- DateTodoCreated --}}
                                 <div class="flex items-center gap-1 text-gray-500">
                                     <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                     </svg>
                                     <p class="text-xs font-medium">
                                         {{ $todo->created_at->setTimezone('Asia/Jakarta')->format('H:i • d/m/y') }}
                                     </p>
                                 </div>

                                 {{-- ToggleTodoStatus --}}
                                 @if ($todo->complated)
                                     <button wire:click='toggle({{ $todo->id }})' class="text-sm underline">
                                         Mark as <span class="text-red-500">Incomplite</span>.
                                     </button>
                                 @else
                                     <button wire:click='toggle({{ $todo->id }})' class="text-sm underline">
                                         Mark as <span class="text-indigo-500">Complete</span>.
                                     </button>
                                 @endif
                             </div>
                         @endif
                     </div>
                 </div>
             @endforeach
         </div>
         {{-- Pagination --}}
         {{ $todos->links() }}
     </div>
 </div>
