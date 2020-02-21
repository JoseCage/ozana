<?php

namespace WatchLater\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use WatchLater\Modules\Users\User;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.welcome')
                    ->with([
                        'fullName'  => $this->user->name,
                        'email'     => $this->user->email,
                        'username'  => $this->user->username,
                    ]);
    }
}
