<?php

namespace Wstd\Application\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordForAdministrator extends ResetPassword
{
    /**
     * Defined by /routes/web.php
     *
     * @var string
     */
    private $routeName = 'admin.password.reset';

    /**
     * Overwrite Illuminate\Auth\Notifications\ResetPassword::toMail()
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::get('Reset Password'), url(config('app.url').route($this->routeName, ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }
}
