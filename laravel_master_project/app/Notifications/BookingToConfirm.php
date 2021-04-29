<?php

namespace App\Notifications;
use Auth;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BookingToConfirm extends Notification
{
    use Queueable;
protected $booking;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking )
    {
      $this->booking=$booking;
    
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
        //  dd($notifiable);
        return [
        //   'bookedTime'=>Carbon::now(),
        'booking'=>$this->booking,
        'user'=>Auth::user(),
      
        ];
         
  
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
