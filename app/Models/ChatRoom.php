<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function scopeReplied($query)
    {
        return $query->whereHas('messages', function ($query) {
            $query->where('sender_id', auth()->id());
        });
    }

    public function scopeUnreplied($query)
    {
        return $query->whereDoesntHave('messages', function ($query) {
            $query->where('sender_id', auth()->id());
        });
    }

    public function scopeUnread($query)
    {
        return $query->whereHas('messages', function ($query) {
            $query->where('read_at', null);
        });
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_room_user');
    }
}
