<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TutorStatusNotification extends Notification
{
    use Queueable;
    public $g_status;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->g_status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return $this->g_status;
        
    }
}
