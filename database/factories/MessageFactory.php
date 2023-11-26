<?php

namespace Database\Factories;

use App\Models\ChatRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $chatRoom = ChatRoom::query()->inRandomOrder()->first();

        return [
            'chat_room_id' => $chatRoom->id,
            'sender_id' => $chatRoom->users()->inRandomOrder()->first()->id,
            'message' => $this->faker->realText(rand(10, 120)),
            'is_read' => true,
            'read_at' => now(),
        ];
    }

    public function unread(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'is_read' => false,
                'read_at' => null,
            ];
        });
    }

    public function sender(int $userId): self
    {
        return $this->state(function (array $attributes) use ($userId) {
            return [
                'sender_id' => $userId,
            ];
        });
    }

    public function chatRoom(int $chatRoomId): self
    {
        return $this->state(function (array $attributes) use ($chatRoomId) {
            return [
                'chat_room_id' => $chatRoomId,
            ];
        });
    }
}
