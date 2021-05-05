<div class="flex flex-col h-screen items-center justify-center">
    <div class="text-center bg-white shadow w-4/12 rounded-lg p-5">
        <p>
            You have successfully logged in
        </p>
        <p class="text-xl">
            {{ auth()->user()->name }}
        </p>
    </div>
</div>
