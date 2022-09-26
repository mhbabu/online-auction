<?php

namespace App\Console\Commands;


use App\Libraries\CommonFunction;
use App\Modules\Settings\Models\EmailQueue;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class EmailCron extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:email-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email from email queue';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->emailSendFromQueue();
    }

    public function emailSendFromQueue()
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try{
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = env('MAIL_HOST');                   // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            // https://myaccount.google.com/lesssecureapps
            $mail->Username   = env('MAIL_USERNAME');               // SMTP username
            $mail->Password   = env('MAIL_PASSWORD');               // SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');             // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = env('MAIL_PORT');                   // TCP port to connect to

            $emailQueue = EmailQueue::where('sending_status',0)
                ->where('status',1)
                ->where('times_of_try','<',9)
                ->take(1)
                ->get();

            if (count($emailQueue)>0){
                foreach ($emailQueue as $key => $email){

                    /*
                     * Sending emails from email_queue
                     */

                    $emailTo = str_replace("'", "", $email->to);
                    $emailCC = str_replace("'", "", $email->cc);


                    //Recipients
                    $mail->setFrom('no-reply@mail.com', env('APP_NAME','Application'));
                    $mail->addAddress($emailTo, '');     // Add a recipient email, Recipient Name is optional
                    $mail->addReplyTo('info@example.com', 'Information');
                    if($email->cc)
                    $mail->addCC($emailCC);
//                    $mail->addBCC('bcc@example.com');


                    // Attachments
                    if($email->attachment)
                    $mail->addAttachment($email->attachment);         // Add attachments
//                    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $attachments = ($email->attachment) ? '<br/><a href="' . $email->attachment . '"><u>Click here for downloading the document.</u></a>' : '' ;
                    $mail->Subject = $email->subject;
                    $mail->Body = $email->content . $attachments;
                    $mail->AltBody = '';

                    // disable verify_peer, its only for local server
                    $serverType = env('APP_ENV');
                    if($serverType == 'local'){
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            ));
                    }
                    // disable verify_peer, its only for local server

                    $email->times_of_try += 1; // indicates number of failed trying to
                    if (!$mail->send()) {
                        $email->remarks = "Email could not be sent. Mailer Error: $mail->ErrorInfo";
                        if ($email->times_of_try > 9) $email->sending_status = -9; // data is invalid, abort sending
                    } else {
                        $email->remarks = "Email has been sent";
                        $email->sending_status = 1;
                        $email->sent_at = Carbon::now();
                    }
                    $mail->ClearAddresses();
                    $mail->ClearCCs();

                    $email->save();
                }
            }

        }catch (\Exception $e){
            dd($mail->ErrorInfo);
//            \Log::error("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
