<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleJob extends Component
{
    public $jobDate,$jobTitle,$hours,$minutes,$ampm,$jobDescription,$jobBudget,$jobPriority,$jobLocation;
    public $rules = [
        'jobTitle' => 'required',
        'jobDate' => 'required',
        'hours' => 'required',
        'minutes' => 'required',
        'ampm' => 'required',
        'jobBudget' => 'required',
        'jobPriority' => 'required',
        'jobDescription' => 'required',
        'jobLocation' => 'required',
    ];
    public function mount()
    {
        $this->hours = '';
        $this->minutes = '';
        $this->ampm = '';
        $this->jobPriority = '';
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $this->validate();
        $startDateTime = $this->jobDate.' '.$this->hours.':'.$this->minutes.' '.$this->ampm;
        $job = Appointment::create([
            'title' => $this->jobTitle,
            'job_startDateTime' => Carbon::parse($startDateTime),
            'user_id' => auth()->id(),
            'job_description' => $this->jobDescription,
            'priority' => $this->jobPriority,
            'location' => $this->jobLocation,
        ]);
        $job->invoice()->create([
            'amount' => $this->jobBudget,
        ]);
        session()->flash('JobSaved', 'Job has been appointed successfully.');
        $this->reset('jobTitle','jobDate','hours','minutes','ampm','jobDescription','jobLocation');
        $this->mount();
    }
    public function render()
    {
        return view('livewire.schedule-job');
    }
}
