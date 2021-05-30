<div class="flex items-center justify-center h-screen">
    <div class="loading" wire:loading wire:target="changePassword"></div>
    <div class="flex flex-col w-7/12 p-5 bg-white shadow rounded-xl">
        <div class="flex justify-between w-full">
            <div class="m-3 text-3xl text-blue-800">
                View Invoice
            </div>
            @if($job->invoice->paid_at == NULL && $job->user == auth()->user())
            <div class="w-1/12 py-4 mx-1 text-center text-white bg-red-800 cursor-pointer rounded-xl" wire:click='payInvoice'>
                Pay
            </div>
            @endif
        </div>
        <div class="flex flex-col text-xl">
            <div class="flex w-full gap-3">
                <div class="font-extrabold text-blue-900">Name:</div>
                <div>{{ $job->title }}</div>
            </div>
            <div class="flex w-full gap-3">
                <div class="font-extrabold text-blue-900">Date of Appointment:</div>
                <div>{{ $job->job_startDateTime }}</div>
            </div>
            <div class="flex w-full gap-3">
                <div class="font-extrabold text-blue-900">Created By:</div>
                <div>{{ $job->user->name }}</div>
            </div>
            <div class="flex w-full gap-3">
                <div class="font-extrabold text-blue-900">Amount:</div>
                <div>{{ $job->invoice->amount }}</div>
            </div>
            <div class="flex w-full gap-3">
                <div class="font-extrabold text-blue-900">Payment Status:</div>
                @if($job->invoice->paid_at)
                <div class="font-bold text-green-700">PAID at {{ $job->invoice->paid_at }}</div>
                @else
                <div class="text-red-700">UNPAID</div>
                @endif
            </div>
        </div>
    </div>
</div>