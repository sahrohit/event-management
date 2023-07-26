<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'emergency_contact',
        'country',
        'id_type',
        'id_number',
        'food_preference',
        'room_preference',
        'require_parking',
        'event_id',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}