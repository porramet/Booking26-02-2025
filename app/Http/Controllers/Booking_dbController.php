<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Ensure the Booking model is imported

class Booking_dbController extends Controller
{
<<<<<<< HEAD
public function index()
{
    $bookings = Booking::with(['user', 'room'])->get();
    
    // Fetch counts for the dashboard
    $totalBookings = Booking::count();
    $pendingApprovals = Booking::where('status_id', 'not_approved')->count();
    $approvedBookings = Booking::where('status_id', 'approved')->count();

    return view('dashboard.booking_db', compact('bookings', 'totalBookings', 'pendingApprovals', 'approvedBookings'));

=======
    public function index()
    {
        // Fetch all bookings with the necessary fields
        $bookings = Booking::select(
            'id',
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
            'is_external'
        )->get();

        return view('dashboard.booking_db', compact('bookings'));
>>>>>>> b260e42e9e58cd2b5bb8aadd1b08e46039d1650e
    }
    
    
}
