<div class="w-screen h-screen bg-blue-100">
    <div class="flex items-center justify-between w-full h-16 px-8 text-3xl text-white uppercase bg-blue-800 border">
        <div class="text-xl">
            <a href="{{ route('landingPage') }}">{{ config('app.name') }}</a>
        </div>
        <div class="flex gap-4 text-xl">
            <a href="{{ route('login') }}">
                Login
            </a>
            <a href="{{ route('register') }}">
                Register
            </a>
            <a href="{{ route('contactUs') }}">
                Contact Us
            </a>
        </div>
    </div>
    <div class="flex flex-col items-center w-full p-4">
        <div class="flex items-center justify-center w-1/3 p-8">
            <img src="{{ asset('statics/logo.png') }}" alt="Logo" class="w-1/3">
        </div>
        <div class="flex flex-col justify-center w-1/2 gap-4 px-8 py-4 bg-white border">
            <h1 class="text-2xl text-center">Contact Us</h1>
            @if(!empty($mailSent))
            <div class="flex justify-center w-full">
                <div class="w-2/3 p-2 text-center text-white bg-green-600 border border-green-900 rounded-full">
                    {{ $this->mailSent }}
                </div>
            </div>
            @endif
            <label>Name</label>
            <input type="text" wire:model.lazy='name' placeholder="Enter your Full Name" class="p-2 border rounded-lg" wire:loading.attr="disabled" wire:target='sendContact'>
            @error('name')
                <div class="text-red-700">{{ $message }}</div>
            @enderror
            <label>Email</label>
            <input type="email" wire:model.lazy='email' placeholder="Enter your Email Address" class="p-2 border rounded-lg" wire:loading.attr="disabled" wire:target='sendContact'>
            @error('email')
                <div class="text-red-700">{{ $message }}</div>
            @enderror
            <label>Message</label>
            <textarea wire:model.lazy='message' placeholder="Enter Message" class="p-2 border rounded-lg" rows="4" wire:loading.attr="disabled" wire:target='sendContact'></textarea>
            @error('message')
                <div class="text-red-700">{{ $message }}</div>
            @enderror
            <button wire:click="sendContact" class="p-2 text-center text-white bg-blue-800 rounded-lg" wire:loading.attr="disabled">
                <div wire:loading wire:target='sendContact'>
                    Sending.............
                </div>
                <div wire:loading.remove wire:target='sendContact'>
                    Send
                </div>
            </button>
        </div>
    </div>
</div>
