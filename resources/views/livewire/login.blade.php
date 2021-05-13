<div>
    <div class="loading" wire:loading wire:target="authenticate"></div>
    <section class="flex flex-col items-center h-screen md:flex-row ">
        <div class="flex items-center justify-center w-full h-screen px-6 bg-white md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 lg:px-16 xl:px-12">
            <div class="w-full h-100">
                <a class="flex items-center w-full mb-4 font-medium text-gray-900 title-font md:mb-0">
                <h2
                    class="text-lg font-bold tracking-tighter text-blue-900 uppercase">
                    {{ config('app.name', 'Laravel') }}
                </h2>
                </a>
                <h1 class="mt-12 text-2xl font-semibold text-blue-700 tracking-ringtighter sm:text-3xl title-font">Log in to your
                    account</h1>
                <form class="mt-6" wire:submit.prevent="authenticate">
                    <div>
                        <label class="block text-sm font-medium leading-relaxed tracking-tighter text-gray-700">Email
                            Address</label>
                        <input id="email" wire:model.lazy="email" type="email" placeholder="Enter Your Email "
                            class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 "
                            autofocus autocomplete>
                            @error('email')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium leading-relaxed tracking-tighter text-gray-700">Password</label>
                        <input id="password" wire:model.lazy="password" type="password"  placeholder="Enter Your Password" minlength="6"
                            class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ">
                            @error('password')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- <div class="mt-2 text-right">
                        <a href="#"
                            class="text-sm font-semibold leading-relaxed text-gray-700 hover:text-black focus:text-blue-700">Forgot
                            Password?</a>
                    </div> --}}
                    <button type="submit" class="block w-full px-4 py-3 mt-6 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Log In</button>
                </form>
                <p class="mt-8 text-center">Need an account? <a href="{{ route('register') }}"
                        class="font-semibold text-blue-500 hover:text-blue-700">Sign Up</a></p>
            </div>
        </div>
    </section>
</div>
