<?php

namespace App\Notifications;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RejectByProvider extends Notification
{
    use Queueable;
    public $Provider;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Provider,$service)
    {
        $this->Provider= $Provider;
        $this->service= $service;
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

   /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'Provider'=>$this->Provider,
            'service'=>$this->service,
         
            'user'=>Auth::user(),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
