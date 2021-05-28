<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class ViewInvoice extends Component
{
    public $job,$jobId;
    public function mount($id)
    {
        $this->jobId = $id;
    }
    public function render()
    {
        $this->job = Appointment::with('invoice')->findOrFail($this->jobId);
        return view('livewire.view-invoice');
    }
}