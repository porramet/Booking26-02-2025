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
        // Fetch all bookings with related data and pass them to the view
        $bookings = Booking::with(['user', 'building', 'room', 'status'])
            ->whereNotNull('room_id')
            ->whereNotNull('building_id')
            ->whereNotNull('status_id')
            ->get();
        return view('dashboard.booking_db', compact('bookings'));
>>>>>>> b260e42e9e58cd2b5bb8aadd1b08e46039d1650e
    }

    public function fetchBookings()
    {
        // Logic to fetch booking data from the database
        return Booking::all();
    }

    public function displayBookings()
    {
        // Logic to format and display booking data
    }
}
