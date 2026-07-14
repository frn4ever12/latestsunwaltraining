<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class CustomVerifyEmail extends VerifyEmail
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);
        $appName = config('app.name');

        return (new MailMessage)
            ->subject(Lang::get('verification.email_subject') . ' - ' . $appName)
            ->greeting(Lang::get('verification.greeting'))
            ->line(Lang::get('verification.intro_line1'))
            ->line(Lang::get('verification.intro_line2'))
            ->action(Lang::get('verification.verify_button'), $verificationUrl)
            ->line(Lang::get('verification.outro_line1'))
            ->line(Lang::get('verification.outro_line2'))
            ->salutation(Lang::get('verification.salutation') . "\n" . $appName)
            ->line(new HtmlString('<div class="text-center" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e9ecef;"><small style="color: #6c757d;">© ' . date('Y') . ' ' . $appName . '. All rights reserved.</small></div>'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return parent::verificationUrl($notifiable);
    }
}
