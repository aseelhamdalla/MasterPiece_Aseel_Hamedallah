<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class AcceptToService extends Notification
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
        // $this->status= $status;
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
            // 'status'=>$this->status,
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
