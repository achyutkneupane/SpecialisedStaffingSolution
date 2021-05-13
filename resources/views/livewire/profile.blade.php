<div class="flex h-screen items-center justify-center">
    <div class="bg-white shadow w-7/12 rounded-xl p-5 flex flex-col items-center">
        <div class="w-full text-3xl m-3 text-center text-blue-800">
            Profile
        </div>
        <div class="flex">
            <div class="w-2/12">
                <img src="https://dummyimage.com/500x500/000/fff&text={{ ucwords(auth()->user()->role) }}" class="rounded-full">
            </div>
            <div class="w-10/12 ml-10 flex flex-col items-center justify-center">
                <div class="w-full flex">
                    <div class="w-2/12 font-extrabold text-blue-900">
                        Name:
                    </div>
                    <div class="w-10/12">
                        {{ auth()->user()->name }}
                    </div>
                </div>
                <div class="w-full flex">
                    <div class="w-2/12 font-extrabold text-blue-900">
                        Email:
                    </div>
                    <div class="w-10/12">
                        {{ auth()->user()->email }}
                    </div>
                </div>
                <div class="w-full flex">
                    <div class="w-2/12 font-extrabold text-blue-900">
                        Role:
                    </div>
                    <div class="w-10/12">
                        {{ ucfirst(auth()->user()->role) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>