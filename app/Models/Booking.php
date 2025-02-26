<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
        'booking_end' => 'datetime',
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    protected $fillable = [
        'user_id',
        'external_name',
        'external_email',
        'external_phone',
        'building_id',
        'room_id',
        'booking_start',
        'booking_end',
        'status_id',
        'reason',
        'total_price',
        'payment_status',
        'is_external',
        'fullname',
        'phone',
        'email',
        'status',
        'department',
        'attendees',
        'purpose'

    ];

}
