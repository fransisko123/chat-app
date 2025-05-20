<?php

namespace App\Http\Controllers;

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
}