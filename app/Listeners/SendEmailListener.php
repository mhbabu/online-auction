<?php

namespace App\Listeners;

use App\Events\SendEmail;
use App\Jobs\ReleaseEmail;
use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SendEmailListener
{
    use DispatchesJobs;
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $mailer;
    public function __construct(MailQueue $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(SendEmail $event)
    {
        $this->dispatch(new ReleaseEmail($event->email));
    }
}
