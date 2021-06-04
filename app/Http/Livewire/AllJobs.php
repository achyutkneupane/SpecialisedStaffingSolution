<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AllJobs extends Component
{
    use WithPagination;
    public $priority,$jobsCount;
    public function mount()
    {
        $this->priority = 'all';
    }
    public function loadJobs($priority)
    {
        $this->resetPage();
        $this->priority = $priority;
    }
    public function getCount($priority)
    {
        if($priority == 'all')
        {
            $j = Appointment::with('user','worker')->associated()->orderBy('priority','DESC')->orderBy('job_startDateTime','ASC');
        }
        else
        {
            if($priority == 'high')
                $priorityNum = '2';
            elseif($priority == 'medium')
                $priorityNum = '1';
            elseif($priority == 'low')
                $priorityNum = '0';
            $j = Appointment::with('user','worker')->associated()->where('priority',$priorityNum)->orderBy('priority','DESC')->orderBy('job_startDateTime','ASC');
        }
        return $j->count();
    }
    public function render()
    {
        if($this->priority == 'all')
        {
            $j = Appointment::with('user','worker')->associated()->orderBy('priority','DESC')->orderBy('job_startDateTime','ASC');
            $this->jobsCount = $j->count();
        }
        else
        {
            if($this->priority == 'high')
                $priorityNum = '2';
            elseif($this->priority == 'medium')
                $priorityNum = '1';
            elseif($this->priority == 'low')
                $priorityNum = '0';
            $j = Appointment::with('user','worker')->associated()->where('priority',$priorityNum)->orderBy('priority','DESC')->orderBy('job_startDateTime','ASC');
            $this->jobsCount = $j->count();
        }
        $jobs = $j->paginate(3);
        return view('livewire.all-jobs',compact('jobs'));
    }
}
