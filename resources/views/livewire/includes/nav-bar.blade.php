<div id="head" class="flex border-blue-800 border-t-2 ">
    <button style="position: relative; left:60%; top: 5px; " wire:click="today">

        <i class="fa-solid fa-calendar-day" style="font-size: 25px;color: rgb(1, 1, 74)" title="today"></i>
    </button>
    <button style="position: relative; left: 50%; top: 5px; " wire:click="upcoming">
        <i class="fa-regular fa-calendar-days" style="font-size: 25px;color: rgb(1, 1, 74)" title="upcoming"></i>
    </button>
    <button style="position: relative; left: 40%; top: 5px; " wire:click="overdue">
        <i class="fa-solid fa-arrow-down-short-wide" style="font-size: 25px;color: rgb(1, 1, 74)" title="overdue"></i>
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
