<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email_to;
    public $email_cc;
    public $email_subject;
    public $email_content;
    public function __construct($email)
    {
        $this->email_to = $email['to'];
        $this->email_cc = $email['cc'];
        $this->email_subject = $email['subject'];
        $this->email_content = $email['content'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email_to)
            ->cc($this->email_cc)
            ->view('email.content')
            ->with([
                'subject' => $this->email_subject,
                'content' => $this->email_content
            ])
            ->subject($this->email_subject);
    }
}
