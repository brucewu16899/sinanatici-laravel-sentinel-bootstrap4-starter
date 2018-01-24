<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Setting;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    public $activationCode;
    public $activationUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $activationCode)
    {
        $this->user = $user;
        $this->activationCode = $activationCode;
        $this->activationUrl = config('app.url') . '/activation/' . $user->email . '/' . $activationCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Hesap Aktivasyon Kodu!';
        return $this
            ->from(config('settings.mailaddresses.general'))
            ->markdown('emails.activation')
            ->subject($subject)
        ;
    }
}
