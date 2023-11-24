<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            $chatRoom = ChatRoom::create([
                'name' => "Chat Room $i",
            ]);

            $customer = User::where('user_level', 2)->inRandomOrder()->first();
            $chatRoom->users()->attach(1);
            $chatRoom->users()->attach($customer->id);

            Message::factory()->count(rand(4, 10))
            ->sequence(fn ($sequence) => [
                'sender_id' => rand(1,2) == 1 ? 1 : $customer->id
            ])
            ->create([
                'chat_room_id' => $chatRoom->id,
            ]);
        }
    }
}
