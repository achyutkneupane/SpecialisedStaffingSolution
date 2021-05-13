<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleJob extends Component
{
    public $jobDate,$jobTitle,$jobs,$hours,$minutes,$ampm;
    public $rules = [
        'jobTitle' => 'required',
        'jobDate' => 'required',
        'hours' => 'required',
        'minutes' => 'required',
        'ampm' => 'required',
    ];
    public function mount()
    {
        $this->hours = '';
        $this->minutes = '';
        $this->ampm = '';
        $this->jobs = json_encode(Appointment::with('user')->orderBy('job_dateTime','ASC')->where('user_id',auth()->id())->get());
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
            'user_id' => auth()->id()
        ]);
        session()->flash('JobSaved', 'Job has been appointed successfully.');
        $this->reset('jobTitle','jobDate','jobs','hours','minutes','ampm');
        $this->hours = '';
        $this->minutes = '';
        $this->ampm = '';
        $this->jobs = json_encode(Appointment::with('user')->orderBy('job_dateTime','ASC')->where('user_id',auth()->id())->get());
    }
    public function render()
    {
        return view('livewire.schedule-job');
    }
}
