<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms'; // กำหนดชื่อตารางให้แน่นอน
    protected $primaryKey = 'room_id'; // แก้จาก 'id' เป็น 'room_id'
    
    protected $keyType = 'int'; // กำหนด type เป็น integer



    protected $fillable = [
        'room_id',
        'room_name',
        'class',
        'room_details',
        'capacity',
        'service_rates',
        'status_id',
        'building_id',
        'image',
    ];

<<<<<<< HEAD
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

=======
>>>>>>> b260e42e9e58cd2b5bb8aadd1b08e46039d1650e
    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id'); // ระบุ foreign key ให้ชัดเจน
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
