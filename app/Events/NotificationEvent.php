<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $icon;
    public $redirect;
    public $url;

    /**
     * Create a new event instance.
     */
    public function __construct($user, $message, $icon, $redirect, $url)
    {
        $this->user = $user;
        $this->message = $message;
        $this->icon = $icon;
        $this->redirect = $redirect;
        $this->url = $url;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('notifirell'),
        ];
    }

    public function broadcastAs()
  {
      return 'notifirell';
  }
}
