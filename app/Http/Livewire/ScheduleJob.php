<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleJob extends Component
{
    public $jobDate,$jobTitle,$hours,$minutes,$ampm,$jobDescription,$jobPriority,$jobLocation,$contactNumber,$jobTimeError;
    public $rules = [
        'jobTitle' => 'required',
        'jobDate' => 'required',
        'jobPriority' => 'required',
        'jobDescription' => 'required',
        'jobLocation' => 'required',
        'contactNumber' => 'required|numeric'
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
        if($this->hours != "" || $this->minutes != "" || $this->ampm != "")
        {
            $this->jobTimeError = NULL;
            $this->validate();
            $startDateTime = $this->jobDate.' '.$this->hours.':'.$this->minutes.' '.$this->ampm;
            $job = Appointment::create([
                'title' => $this->jobTitle,
                'job_startDateTime' => Carbon::parse($startDateTime),
                'user_id' => auth()->id(),
                'job_description' => $this->jobDescription,
                'priority' => $this->jobPriority,
                'location' => $this->jobLocation,
                'contact' => $this->contactNumber
            ]);
            $job->invoice()->create([
                'paid_at' => null,
            ]);
            session()->flash('JobSaved', 'Job has been appointed successfully.');
            $this->reset('jobTitle','jobDate','hours','minutes','ampm','jobDescription','jobLocation','jobPriority','contactNumber');
            $this->mount();
        }
        else
        {
            $this->jobTimeError = 'The job time field is required.';
            $this->validate();
        }
    }
    public function render()
    {
        return view('livewire.schedule-job');
    }
}
