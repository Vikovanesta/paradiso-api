<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChatRoomResource;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

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
        $chat->load(['users', 'messages']);

        return $this->success(new ChatRoomResource($chat), 'Suceesfully retrieved chat room');
    }
    
}
