<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\MessageSent;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // Ambil semua conversation yang melibatkan user saat ini
        $conversations = Conversation::where('user_one_id', $user->id)
            ->orWhere('user_two_id', $user->id)
            ->with(['userOne', 'userTwo', 'latestMessage'])
            ->get();

        // Hitung unread message count
        foreach ($conversations as $conv) {
            $conv->unread_count = $conv->messages
                ->where('sender_id', '!=', $user->id) // bukan pesan kita sendiri
                ->filter(function ($msg) use ($user) {
                    return !$msg->reads->where('user_id', $user->id)->count();
                })
                ->count();
        }

        $activeConversation = null;
        $messages = collect();

        if ($request->has('conversation')) {
            $activeConversation = Conversation::with(['messages.sender', 'userOne', 'userTwo'])
                ->findOrFail($request->conversation);

            // Tandai semua pesan sudah dibaca user
            foreach ($activeConversation->messages as $message) {
                $message->reads()->firstOrCreate(['user_id' => $user->id]);
            }

            $messages = $activeConversation->messages;
        }

        if ($request->ajax()) {
            // Return partial chatbox view (hanya pesan saja)
            return view('chat._chatbox', [
                'messages' => $messages,
                'activeConversation' => $activeConversation,
            ]);
        }

        // Kalau bukan AJAX, return full view
        return view('chat.index', [
            'conversations' => $conversations,
            'activeConversation' => $activeConversation,
            'messages' => $messages
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'body' => 'required|string|max:1000',
        ]);

        $conversation = Conversation::findOrFail($request->conversation_id);

        // Pastikan user adalah peserta conversation
        if (!in_array(auth()->id(), [$conversation->user_one_id, $conversation->user_two_id])) {
            abort(403, 'Unauthorized');
        }

        // CREATE MESSAGE
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => auth()->id(),
            'body' => $request->body,
        ]);

        // Broadcast message to the conversation channel
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'success']);
    }

    public function unreadCount(Conversation $conversation)
    {
        $user = auth()->user();
        $unread = $conversation->unreadCountFor($user);
        return response()->json(['unread' => $unread]);
    }
}