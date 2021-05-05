<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleJob extends Component
{
    public $jobDate,$jobTitle,$jobs;
    public $rules = [
        'jobTitle' => 'required',
        'jobDate' => 'required'
    ];
    public function mount()
    {
        $this->jobs = json_encode(Appointment::with('user')->orderBy('job_date','ASC')->where('user_id',auth()->id())->get());
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $this->validate();
        Appointment::create([
            'title' => $this->jobTitle,
            'job_date' => Carbon::parse($this->jobDate),
            'user_id' => auth()->id()
        ]);
        session()->flash('JobSaved', 'Job has been appointed successfully.');
        $this->reset('jobTitle','jobDate','jobs');
        $this->jobs = json_encode(Appointment::with('user')->orderBy('job_date','ASC')->where('user_id',auth()->id())->get());
    }
    public function render()
    {
        return view('livewire.schedule-job');
    }
}
