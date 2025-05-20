<?php

namespace App\Models;

use App\Models\User;
use App\Models\MessageRead;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['conversation_id', 'sender_id', 'body', 'attachment'];

    protected $with = ['sender', 'reads'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function reads()
    {
        return $this->hasMany(MessageRead::class);
    }

    public function isReadBy(User $user)
    {
        return $this->reads()->where('user_id', $user->id)->exists();
    }
}
