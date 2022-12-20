<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $Registration_Mail = "" ;
    public function __construct($Registration_Mail)
    {
        $this->Registration_Mail = $Registration_Mail;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build(){
        return $this->subject('Welcome sir in our EduCare BD')->view('SmtpMail.RegistrationSuccessMail',[
            'Registration_Mail' => $this->Registration_Mail
        ]);
    }
}
