<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Ensure the Booking model is imported

class Booking_dbController extends Controller
{
public function index()
{
    $bookings = Booking::with(['user', 'room'])->get();
    
    // Fetch counts for the dashboard
    $totalBookings = Booking::count();
    $pendingApprovals = Booking::where('status_id', 'not_approved')->count();
    $approvedBookings = Booking::where('status_id', 'approved')->count();

    return view('dashboard.booking_db', compact('bookings', 'totalBookings', 'pendingApprovals', 'approvedBookings'));

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
