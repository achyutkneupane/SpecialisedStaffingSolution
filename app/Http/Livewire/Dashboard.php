<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class Dashboard extends Component
{
    public function getJobsCount($priority)
    {
        return Appointment::associated()->where('priority',$priority)->count();
    }
    public function getFourJobs($priority)
    {
        return Appointment::associated()->where('priority',$priority)->orderBy('priority','ASC')->orderBy('job_startDateTime','ASC')->take(4)->get(['id','title']);
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
