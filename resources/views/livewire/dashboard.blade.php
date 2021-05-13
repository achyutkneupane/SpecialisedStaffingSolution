<div class="flex flex-col h-screen items-center justify-center">
    <div class="text-center bg-white shadow w-4/12 rounded-lg p-5">
        <img src="{{ asset('statics/logo.jpeg') }}" alt="Logo" class="my-3 p-2">
        <p>
            You have successfully logged in
        </p>
        <p class="text-xl text-blue-800">
            {{ auth()->user()->name }}
        </p>
    </div>
</div>
