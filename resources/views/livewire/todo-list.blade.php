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
    @include('livewire.includes.nav-bar')
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
