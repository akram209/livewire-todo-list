<div class="p-6 text-gray-900">
    <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
        <div class="flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search..."
                class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">number of todos</th>
                    <th scope="col">isAdmin</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>

                        <th scope="row">{{ $user->id }} </th>
                        @if ($editId == $user->id)
                            <td>
                                <input wire:model="editName" type="text"
                                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                            </td>
                        @else
                            <td>{{ $user->name }}</td>
                        @endif
                        @if ($editId == $user->id)
                            <td>
                                <input wire:model="editEmail" type="email"
                                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                            </td>
                        @else
                            <td>{{ $user->email }}</td>
                        @endif
                        <td>{{ $user->numTodos }}</td>
                        @if ($editId == $user->id)
                            <td>
                                <input wire:model="editIs_admin" type="number"
                                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5" min="0"
                                    max="1" style="width: 45px">
                            </td>
                        @else
                            <td>{{ $user->is_admin }}</td>
                        @endif
                        <td>{{ $user->created_at }}</td>

                        <td>
                            @if ($editId != $user->id)
                                <button onclick="window.location='{{ route('home', ['user' => $user->id]) }}'"
                                    class="text-sm text-blue-500 font-semibold rounded hover:text-teal-800"
                                    title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                                <button wire:click="edit({{ $user->id }})"
                                    class="text-sm text-teal-500 font-semibold rounded hover:text-teal-800"
                                    title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $user->id }})"
                                    class="text-sm text-red-500 font-semibold rounded hover:text-teal-800 mr-1"
                                    title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            @else
                                <button wire:click="update({{ $user->id }})"
                                    class="text-sm text-teal-500 font-semibold rounded hover:text-teal-800 mr-1"
                                    title="update">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>

                                </button>
                                <button wire:click="cancel"
                                    class="text-sm text-red-500 font-semibold rounded hover:text-teal-800 mr-1"
                                    title="cancel"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="my-2 " style="width: 60%;margin-left:20%;" color="white">
            {{ $users->links() }}
        </div>

    </div>
