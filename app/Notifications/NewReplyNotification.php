<?php

namespace App\Notifications;

use App\Model\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReplyNotification extends Notification
{
    use Queueable;
    public $reply;

    /**
     * Create a new notification instance.
     *
     * @param Reply $reply
     */
    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
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
    public function toArray($notifiable)
    {
        return [
            'replyBy' => $this->reply->user->name,
            'replyContent' => $this->reply->body,
            'question' => $this->reply->question->title,
            'path' => $this->reply->question->path,
        ];
    }
}
