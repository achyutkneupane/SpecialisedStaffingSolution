<?php

namespace App\Listeners;

use App\Mail\AssignedJobNotification;
use App\Notifications\AssignedToJobNotification;
use App\Notifications\AssignedToJobNotificationForCustomer;
use App\Notifications\JobApprovedNotification;
use App\Notifications\NotificationOnTheDay;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Thomasjohnkane\Snooze\Models\ScheduledNotification;

class SendAssignedToJobNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send($event->job->worker, new AssignedToJobNotification($event->job));
        Notification::send($event->job->user, new AssignedToJobNotificationForCustomer($event->job));
        if(empty($event->prev))
            Notification::send($event->job->user, new JobApprovedNotification($event->job));
        Mail::to($event->job->worker->email)
            ->send(new AssignedJobNotification($event->job));
    }
}
