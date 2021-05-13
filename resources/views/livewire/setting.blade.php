<div class="flex h-screen items-center justify-center">
    <div class="loading" wire:loading wire:target="changePassword"></div>
    <div class="bg-white shadow w-7/12 rounded-xl p-5 flex flex-col items-center">
        <div class="w-full text-3xl m-3 text-center text-blue-800">
            Change Password
        </div>
        <div class="flex flex-col w-7/12">
            <form wire:submit.prevent="changePassword">
                @if(session()->has('PasswordChanged'))
                <div class="my-2 border border-green-800 bg-green-200 text-gray-600 rounded-xl py-2 text-center">
                    {!! session('PasswordChanged') !!}
                </div>
                @endif
                <div class="relative mt-4">
                    <label for="old_password" class="text-sm leading-7 text-gray-600">Old Password</label>
                    <input type="password" id="old_password" wire:model.lazy="old_password" placeholder="Enter Old Password"
                        class="w-full px-4 py-2 mr-4 text-base bg-gray-100 text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        @error('old_password')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                </div>
                <div class="relative mt-4">
                    <label for="new_password" class="text-sm leading-7 text-gray-600">New Password</label>
                    <input type="password" id="new_password" wire:model.lazy="new_password" placeholder="Enter New Password"
                        class="w-full px-4 py-2 mr-4 text-base bg-gray-100 text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        @error('new_password')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                </div>
                <div class="relative mt-4">
                    <label for="re_new_password" class="text-sm leading-7 text-gray-600">Confirm Password</label>
                    <input type="password" id="re_new_password" wire:model.lazy="confirm_password" placeholder="Re-enter New Password"
                        class="w-full px-4 py-2 mr-4 text-base bg-gray-100 text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        @error('confirm_password')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                </div>
                <div class="text-center mt-4">
                    <button
                        class="w-3/12 py-2 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>