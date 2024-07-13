<div class="container content py-6 mx-auto">

    <form wire:submit.prevent="create">
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label"> Name</label>
            <input wire:model="name" type="text" class="form-control rounded" id="exampleInputName1">
            @error('name')
                <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input wire:model="email" type="email" class="form-control rounded" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('email')
                <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input wire:model="password" type="password" class="form-control rounded" id="exampleInputPassword1">
            @error('password')
                <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input wire:model="is_admin" type="checkbox" value="1" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Is admin ?</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>
