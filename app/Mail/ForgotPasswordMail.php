<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Setting;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $forgotPasswordCode;
    public $forgotPasswordUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $forgotPasswordCode)
    {
        $this->user = $user;
        $this->activationCode = $forgotPasswordCode;
        $this->forgotPasswordUrl = config('app.url') . '/reset/' . $user->email . '/' . $forgotPasswordCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Şifre Yenileme';
        return $this
            ->from(config('settings.mailaddresses.general'))
            ->markdown('emails.forgot-password')
            ->subject($subject)
        ;
    }
}
