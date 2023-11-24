<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    protected $fillable = [
        'chat_room_id',
        'sender_id',
        'message',
        'is_read',
        'read_at',
    ];

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function isUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function idRead($query)
    {
        return $query->where('is_read', true);
    }
}
