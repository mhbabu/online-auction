<?php

namespace App\Jobs;

use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class ReleaseEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MailQueue $mailer)
    {
        try {

            \Mail::queue(new SendMail($this->email));

        } catch (\Exception $exception) {
            dd($exception->getLine(),$exception->getFile(),$exception->getMessage());

            $logMessage = 'Email could not be sent : '. $exception->getMessage();
            dd($logMessage);
            writeToLog($logMessage, 'error');
        }
    }

}
