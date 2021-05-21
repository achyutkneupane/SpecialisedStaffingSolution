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
        $jobs = Appointment::with('user','worker')->associated()->orderBy('job_startDateTime','ASC')->paginate(4);
        return view('livewire.all-jobs', compact('jobs'));
    }
}
