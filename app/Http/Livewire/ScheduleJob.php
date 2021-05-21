<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleJob extends Component
{
    public $jobDate,$jobTitle,$hours,$minutes,$ampm,$jobDescription;
    // public $endJobDate,$endHours,$endMinutes,$endAmpm;
    public $rules = [
        'jobTitle' => 'required',
        'jobDate' => 'required',
        'hours' => 'required',
        'minutes' => 'required',
        'ampm' => 'required',
        // 'endJobDate' => 'required',
        // 'endHours' => 'required',
        // 'endMinutes' => 'required',
        // 'endAmpm' => 'required',
        'jobDescription' => 'required'
    ];
    public function mount()
    {
        $this->hours = '';
        $this->minutes = '';
        $this->ampm = '';
        // $this->endHours = '';
        // $this->endMinutes = '';
        // $this->endAmpm = '';
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $this->validate();
        $startDateTime = $this->jobDate.' '.$this->hours.':'.$this->minutes.' '.$this->ampm;
        // $endDateTime = $this->endJobDate.' '.$this->endHours.':'.$this->endMinutes.' '.$this->endAmpm;
        Appointment::create([
            'title' => $this->jobTitle,
            'job_startDateTime' => Carbon::parse($startDateTime),
            // 'job_endDateTime' => Carbon::parse($endDateTime),
            'user_id' => auth()->id(),
            'job_description' => $this->jobDescription,
        ]);
        session()->flash('JobSaved', 'Job has been appointed successfully.');
        $this->reset('jobTitle','jobDate','hours','minutes','ampm','jobDescription');
        // $this->reset('endJobDate','endHours','endMinutes','endAmpm');
        $this->mount();
    }
    public function render()
    {
        return view('livewire.schedule-job');
    }
}
