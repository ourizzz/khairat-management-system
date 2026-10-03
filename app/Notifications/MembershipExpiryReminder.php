<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class MembershipExpiryReminder extends Notification
{
    use Queueable;

    protected $daysLeft;
    protected $expiryDate;

    public function __construct($daysLeft, $expiryDate)
    {
        $this->daysLeft = $daysLeft;
        $this->expiryDate = $expiryDate;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        if ($this->daysLeft === 1) {
            $message = 'Your Khairat membership will expire tomorrow.';
        } else {
            $message = 'Your Khairat membership will expire in '
                . $this->daysLeft
                . ' days.';
        }

        return [
            'title' => 'Membership Expiry Reminder',

            'message' => $message,

            'expiry_date' => $this->expiryDate,

            'type' => 'membership_expiry',
        ];
    }
}