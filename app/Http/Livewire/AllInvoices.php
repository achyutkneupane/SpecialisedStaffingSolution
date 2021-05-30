<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AllInvoices extends Component
{
    use WithPagination;
    public function render()
    {
        $jobs = Appointment::with('user','worker','invoice')->associated()->orderBy('priority','DESC')->orderBy('job_startDateTime','ASC')->where('status','completed')->paginate(4);
        return view('livewire.all-invoices', compact('jobs'));
    }
}
