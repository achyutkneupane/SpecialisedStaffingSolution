<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Thomasjohnkane\Snooze\Traits\SnoozeNotifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = [
        'worker_work_days',
    ];
    public function jobs()
    {
        return $this->hasMany(Appointment::class,'user_id');
    }
    public function works()
    {
        return $this->hasMany(Appointment::class,'worker_id');
    }
    public function getWorkerWorkDaysAttribute()
    {
        $days = collect();
        if($this->works()->count() > 0)
        {
            foreach($this->works()->get() as $work) {
                $days->push(Carbon::parse($work->job_startDateTime)->format('Y-m-d'));
            }
        }
        return $days;
    }
}
