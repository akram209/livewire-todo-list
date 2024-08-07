<div class="container content py-6 mx-auto">
    <div class="mx-auto">
        <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2"
            style="background: linear-gradient(to right, rgb(160, 160, 180), white); ">
            <div class="flex ">
                <h2 class="font-semibold text-lg text-gray-800 mb-5">Create New Todo</h2>
            </div>
            <div>
                <form>
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">*
                            Todo </label>
                        <input wire:model="name" type="text" id="name" placeholder="Todo.."
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                        @error('name')
                            <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror
                        <label for="Date" class="block mb-2 text-sm font-medium text-gray-900">
                            <input type="date" wire:model="date" min="{{ now()->format('Y-m-d') }}"
                                max="{{ now()->addYears(1)->format('Y-m-d') }}"
                                class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5 mt-3">
                        </label>
                        @error('date')
                            <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror

                    </div>

                    <button wire:click.prevent="create" type="submit"
                        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Create
                        +</button>
                    @if (session()->has('message'))
                        <span class="text-green-500 text-xs">{{ session('message') }}</span>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
