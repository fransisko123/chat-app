<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message->load('sender'); // pastikan relasi sender sudah dimuat
    }

    public function broadcastOn(): PrivateChannel
    {
        // Log::info('Broadcasting event to conversation ' . $this->message->conversation_id);
        return new PrivateChannel('private-conversations.' . $this->message->conversation_id);
    }

    public function broadcastWith()
    {
        return [
            'message' => [
                'id' => $this->message->id,
                'body' => $this->message->body,
                'sender_id' => $this->message->sender_id,
                'created_at' => $this->message->created_at->toDateTimeString(),
                'sender' => [
                    'name' => $this->message->sender->name,
                    'avatar_url' => $this->message->sender->avatar_url,
                ],
            ],
        ];
    }
}
