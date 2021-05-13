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
    public $rules = [
        'jobTitle' => 'required',
        'jobDate' => 'required',
        'hours' => 'required',
        'minutes' => 'required',
        'ampm' => 'required',
        'jobDescription' => 'required'
    ];
    public function mount()
    {
        $this->hours = '';
        $this->minutes = '';
        $this->ampm = '';
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $this->validate();
        $dateTime = $this->jobDate.' '.$this->hours.':'.$this->minutes.' '.$this->ampm;
        Appointment::create([
            'title' => $this->jobTitle,
            'job_dateTime' => Carbon::parse($dateTime),
            'user_id' => auth()->id(),
            'job_description' => $this->jobDescription,
        ]);
        session()->flash('JobSaved', 'Job has been appointed successfully.');
        $this->reset('jobTitle','jobDate','hours','minutes','ampm','jobDescription');
        $this->hours = '';
        $this->minutes = '';
        $this->ampm = '';
    }
    public function render()
    {
        return view('livewire.schedule-job');
    }
}
