<div>
    <div class="flex flex-col lg:flex-row w-screen h-screen justify-center items-center">
        <form wire:submit.prevent="authenticate" class="w-full lg:h-3/4 lg:w-6/12 shadow bg-blue-100 rounded-3xl flex flex-col justify-center items-center">
            <label class="text-gray-700 font-bold" for="email">Email</label>
            <input id="email" wire:model.lazy="email" type="email" class="bg-gray-100 px-3 py-2 border border-gray-400 placeholder-gray-400 text-black rounded-lg w-1/2" placeholder="Enter email address">
            @error('email')
                <span class="text-red-700">{{ $message }}</span>
            @enderror
            <label class="text-gray-700 font-bold text-left mt-6" for="password">Password</label>
            <input id="password" wire:model.lazy="password" type="password" class="bg-gray-100 px-3 py-2 border border-gray-400 placeholder-gray-400 text-black rounded-lg w-1/2" placeholder="Enter password">
            @error('password')
                <span class="text-red-700">{{ $message }}</span>
            @enderror
            <button class="mt-5 py-3 px-6 rounded-lg border-b-2 border-blue-500 bg-gray-200 hover:border-blue-900" type="submit">Login</button>
        </form>
    </div>
</div>
