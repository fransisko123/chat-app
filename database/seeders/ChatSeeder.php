<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Message;
use App\Models\MessageRead;
use App\Models\Conversation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::where('name', 'Iko')->first();
        $user2 = User::where('name', 'Iko2')->first();

        if (!$user1 || !$user2) {
            $this->command->warn('User Iko dan Iko2 harus ada dulu di database.');
            return;
        }

        $conversation = Conversation::firstOrCreate([
            'user_one_id' => $user1->id,
            'user_two_id' => $user2->id,
        ]);

        // Buat 10 pesan bergantian antara Iko dan Iko2
        for ($i = 1; $i <= 10; $i++) {
            $sender = $i % 2 === 0 ? $user2 : $user1;

            $message = Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $sender->id,
                'body' => "Pesan ke-$i dari {$sender->name}",
            ]);

            // Tandai sebagai sudah dibaca oleh penerima
            $receiver = $sender->id === $user1->id ? $user2 : $user1;

            MessageRead::create([
                'message_id' => $message->id,
                'user_id' => $receiver->id,
                'read_at' => now(),
            ]);
        }
    }
}
