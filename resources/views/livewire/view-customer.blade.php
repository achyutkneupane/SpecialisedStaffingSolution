<div class="h-screen w-full">
    <div class="loading" wire:loading></div>
    <div class="flex flex-col h-screen items-center justify-center">
        <div class="bg-white shadow w-9/12 rounded-lg p-5">
            <div class="flex flex-col justify-around w-full">
                <div class="flex">
                    <div class="text-4xl font-bolder pb-4 w-11/12">View Customer</div>
                    @if(!$customer->blocked)
                    <div class="w-1/12 py-4 rounded-xl cursor-pointer bg-blue-800 text-white text-center" wire:click='blockCustomer'>Block</div>
                    @else
                    <div class="w-1/12 py-4 rounded-xl cursor-pointer bg-blue-800 text-white text-center" wire:click='unblockCustomer'>Unblock</div>
                    @endif
                </div>
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Name: </div>
                    <div class="text-xl w-9/12">{{ $customer->name }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Email: </div>
                    <div class="text-xl w-9/12">{{ $customer->email }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Jobs Created: </div>
                    <div class="text-xl w-9/12">{{ $customer->jobs->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
