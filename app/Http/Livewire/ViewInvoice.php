<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Invoice;
use Livewire\Component;

class ViewInvoice extends Component
{
    public $job,$jobId;
    public function mount($id)
    {
        $this->jobId = $id;
    }
    public function payInvoice()
    {
        Invoice::where('appointment_id',$this->jobId)->update([
            'paid_at' => now(),
        ]);
    }
    public function render()
    {
        $this->job = Appointment::with('invoice')->findOrFail($this->jobId);
        return view('livewire.view-invoice');
    }
}