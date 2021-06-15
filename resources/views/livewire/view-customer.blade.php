<div class="w-full h-screen">
    <div class="loading" wire:loading></div>
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="w-9/12 p-5 bg-white rounded-lg shadow">
            <div class="flex flex-col justify-around w-full">
                <div class="flex">
                    <div class="w-11/12 pb-4 text-4xl font-bolder">View Customer</div>
                    @if(!$customer->blocked)
                    <div class="w-1/12 py-4 text-center text-white bg-blue-800 cursor-pointer rounded-xl" wire:click='blockCustomer'>Block</div>
                    @else
                    <div class="w-1/12 py-4 text-center text-white bg-blue-800 cursor-pointer rounded-xl" wire:click='unblockCustomer'>Unblock</div>
                    @endif
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Name: </div>
                    <div class="w-9/12 text-xl">{{ $customer->name }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Email: </div>
                    <div class="w-9/12 text-xl">{{ $customer->email }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Jobs Created: </div>
                    <div class="w-9/12 text-xl">{{ $customer->jobs->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
