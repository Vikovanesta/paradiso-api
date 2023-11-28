<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Http\Requests\ChatRoomStoreRequest;
use App\Http\Requests\MessageStoreRequest;
use App\Http\Resources\ChatRoomResource;
use App\Models\ChatRoom;
use App\Notifications\MessageReceivedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;

class ChatController extends Controller
{
    /**
     * Get all chat rooms.
     *
     * @group Chat
     * 
     * @authenticated
     */
    public function index()
    {
        $chat =ChatRoom::with(['users'])
                ->whereRelation('users', 'user_id', auth()->id())
                ->get();

        return $this->success(ChatRoomResource::collection($chat), 'Suceesfully retrieved chat rooms');
    }

    /**
     * Get chat room by id.
     *
     * @group Chat
     * 
     * @authenticated
     */
    public function show(ChatRoom $chat)
    {   
        Gate::authorize('view-chatRoom', $chat);

        $chat->load(['users', 'messages']);

        return $this->success(new ChatRoomResource($chat), 'Suceesfully retrieved chat room');
    }

    // /**
    //  * Create new chat room.
    //  *
    //  * @group Chat
    //  * 
    //  * @authenticated
    //  */
    // public function store(ChatRoomStoreRequest $request)
    // {
    //     $validated = $request->validated();

    //     $chat = ChatRoom::create([
    //         'name' => $validated->name,
    //     ]);

    //     $chat->users()->attach($validated->users);

    //     return $this->success(new ChatRoomResource($chat), 'Suceesfully created chat room');
    // }

    /**
     * Create new message.
     *
     * @group Chat
     * 
     * @authenticated
     */
    public function storeMessage(MessageStoreRequest $request, ChatRoom $chat)
    {
        $validated = $request->validated();

        $message = $chat->messages()->create([
            'sender_id' => auth()->id(),
            'message' => $request->message,
        ]);

        event(new MessageSend($chat, $message));
        Notification::send($chat->users->where('id', '!=', $message->sender_id), new MessageReceivedNotification($chat, $message));

        // $chat->users()->updateExistingPivot(auth()->id(), [
        //     'last_read_at' => now(),
        // ]);

        $chat->load(['users', 'messages']);

        return $this->success(new ChatRoomResource($chat), 'Suceesfully created message');
    }
}
