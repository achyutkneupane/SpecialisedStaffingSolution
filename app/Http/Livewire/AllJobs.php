<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AllJobs extends Component
{
    use WithPagination;
    public function render()
    {
        $jobs = Appointment::orderBy('job_dateTime','ASC')->paginate(4);
        return view('livewire.all-jobs', compact('jobs'));
    }
}
