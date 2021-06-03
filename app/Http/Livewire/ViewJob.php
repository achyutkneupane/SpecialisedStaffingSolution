<?php

namespace App\Http\Livewire;

use App\Events\AssignedToJob;
use App\Models\Appointment;
use App\Models\Milestone;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ViewJob extends Component
{
    public $job,$showInput,$employee,$jobId,$workers,$review,$rating,$note,$remark,$startJobDate,$endJobDate,$milestoneText,$statusChangerFlag,$jobStatus;
    public function mount($id)
    {
        $this->jobId = $id;
        $this->employee = '';
        $this->rating = '';
        $this->showInput = false;
        $this->statusChangerFlag = false;
        $this->jobStatus = '';
    }
    public function assign()
    {
        $this->validate([
            'employee' => 'required'
        ]);
        $prev = $this->job->worker;
        $this->job->worker()->associate(User::find($this->employee));
        $this->job->status = 'inactive';
        $this->job->save();
        $this->showInput = false;
        $this->emit('clearNotf');
        event(new AssignedToJob($job = $this->job,$prev));
    }
    public function cancelBooking()
    {
        $this->job->update(['status'=>'closed']);
    }
    public function addReview()
    {
        $this->validate([
            'review' => 'required',
            'rating' => 'required',
        ]);
        $this->job->review()->create([
            'review' => $this->review,
            'rating' => $this->rating,
            ]);
    }
    public function cancelJob()
    {
        $this->job->update(['worker_id'=>NULL]);
        redirect()->route('allJobs');
    }
    public function managerCancel()
    {
        $this->job->update(['worker_id'=>NULL]);
        $this->job->update(['status'=>'closed']);
    }
    public function changeStatus()
    {
        $this->statusChangerFlag = true;
    }
    public function submitNote()
    {
        $this->validate([
            'note' => 'required'
        ]);
        $this->job->notes()->create([
            'note' => $this->note
        ]);
    }
    public function submitRemark()
    {
        $this->validate([
            'remark' => 'required'
        ]);
        $this->job->remark()->create([
            'remark' => $this->remark
        ]);
    }
    public function addMilestone()
    {
        $this->validate([
            'startJobDate' => 'required',
            'endJobDate' => 'required',
            'milestoneText' => 'required'
        ]);
        $this->job->milestones()->create([
            'startDate' => Carbon::parse($this->startJobDate),
            'endDate' => Carbon::parse($this->endJobDate),
            'text' => $this->milestoneText
        ]);
    }
    public function completeMilestone($id)
    {
        Milestone::find($id)->update([
            'completed_at' => now()
        ]);
    }
    public function updated($propertyName)
    {
        if($propertyName == 'jobStatus') {
            $this->job->update(['status'=>$this->jobStatus]);
            $this->statusChangerFlag = false;
        }
    }
    public function render()
    {
        $this->workers = User::where('role','employee')->get();
        $this->job = Appointment::with('user','worker','review','milestones','notes','remark')->findOrFail($this->jobId);
        return view('livewire.view-job');
    }
}
