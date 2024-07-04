<div>
    @if (session()->has('Error'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Erorr</span> {{ session('Error') }}
            </div>
        </div>
    @endif
    <div id="head" class="flex border-blue-800 border-t-2 ">
        <button style="position: relative; left:60%; top: 5px; " wire:click="today()">

            <i class="fa-solid fa-calendar-day" style="font-size: 25px;color: rgb(1, 1, 74)" title="today"></i>
        </button>
        <button style="position: relative; left: 50%; top: 5px; " wire:click="upcoming()">
            <i class="fa-regular fa-calendar-days" style="font-size: 25px;color: rgb(1, 1, 74)" title="upcoming"></i>
        </button>
        <button style="position: relative; left: 40%; top: 5px; " wire:click="overdue()">
            <i class="fa-solid fa-arrow-down-short-wide" style="font-size: 25px;color: rgb(1, 1, 74)"
                title="overdue"></i>
        </button>

        <button style="position: relative; left: 30%; top: 5px; "
            onclick="window.location='{{ route('completed', ['user' => auth()->user()->id]) }}'">
            <i class="fa-solid fa-list-check" style="font-size: 25px;color: rgb(1, 1, 74)" title="completed"></i>
        </button>


        <div class="w-full">
            <header class="flex bg-white justify-between h-20 border-b border-b-gray-200 items-center px-6">
                <div id="left-header" class="">
                </div>
                <div id="right-header" class="text-gray-800 hover:text-gray-600 space-x-3">

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                        x-on:profile-updated.window="name = $event.detail.name"></div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <button wire:click="logout" class="w-full text-start">
                                    <x-dropdown-link href="{{ route('logout') }}">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    </div>


                </div>

            </header>

        </div>

    </div>
    <div id="content" class="mx-auto" style="max-width:500px; ">
        @include('livewire.includes.create-toddo-box')
        @include('livewire.includes.search-box')

        <div id="todos-list">

            @foreach ($todos as $todo)
                @include('livewire.includes.todo-card')
            @endforeach
            <div class="my-2 ">
                {{ $todos->links() }}
            </div>
        </div>
    </div>
</div>
