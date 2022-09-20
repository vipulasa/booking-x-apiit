<?php

namespace App\Notifications;

use App\Models\Finance\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationSuccess extends Notification
{
    use Queueable;

    public Booking $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('BookingX - Reservation Success')
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('Your reservation has been successfully placed.')

                    ->line('Reservation ID: ' . $this->booking->id)
                    ->line('Package: ' . $this->booking->package->title)
                    ->line('Hotel: ' . $this->booking->package->hotel->name)
                    ->line('Check In: ' . $this->booking->reservation_start)
                    ->line('Check Out: ' . $this->booking->reservation_end)
                    ->line('Number of Days: ' . $this->booking->number_of_days)
                    ->line('Number of People: ' . $this->booking->number_of_people)
                    ->line('Total Price: LKR' . number_format($this->booking->total_price, 2))

                    ->action('View Reservation', url(route('reservation.index')))
                    ->line('Thank you for using our application!');
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
