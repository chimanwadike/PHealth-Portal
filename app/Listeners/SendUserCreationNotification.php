<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserCreated as UserCreatedEvent;
use App\Notifications\UserCreated as UserCreatedNotification;

class SendUserCreationNotification
{
    use InteractsWithQueue;

    public $queue = 'default';

    public function __construct()
    {
        //
    }

    
    public function handle(UserCreatedEvent $event)
    {
        //Send notification to the new administrator
        $event->user->notify(new UserCreatedNotification($event->user, $event->password));
    }

    public function failed(UserCreatedNotification $event, $exception)
    {

    }
}
