<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function worker()
    {
        return $this->belongsTo(User::class,'worker_id');
    }
    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
    public function review()
    {
        return $this->hasOne(Review::class);
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function notes()
    {
        return $this->hasMany(JobNote::class);
    }
    public function remark()
    {
        return $this->hasOne(JobRemark::class);
    }
    public function scopeAssociated($query)
    {
        if(auth()->user()->role == 'manager')
        return $query;
        else
        return $query->where('user_id', auth()->id())
                     ->orWhere('worker_id',auth()->id());
    }
}
