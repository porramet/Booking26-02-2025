<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Building;

class BookingController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลอาคารและห้องพัก
        $buildings = Building::with('rooms')->get();
        $rooms = Room::with('status')->get();
        return view('booking', compact('buildings', 'rooms'));
    }

     public function showBookingForm($id)
    {
        $rooms = Room::all();
        $room = Room::findOrFail($id);
        
        // Explicitly set the id property
        $room->id = $room->room_id;
        
        // Debug room data
        \Log::debug('Room object in showBookingForm:', [
            'id' => $room->id,
            'exists' => $room->exists,
            'attributes' => $room->getAttributes()
        ]);
        
        return view('partials.booking-form', compact('room'));
    }

    public function store(Request $request)
    {
        try {
            // Debug incoming request
            \Log::debug('Incoming booking request:', $request->all());
            
            // Validate input
            $validated = $request->validate([
                'room_id' => 'required|exists:rooms,room_id',
                'building_id' => 'required|exists:buildings,id',
                'external_name' => 'required|string|max:255',
                'external_email' => 'required|email|max:255',
                'external_phone' => 'required|string|max:20',
                'booking_start' => 'required|date|after:now',
                'booking_end' => 'required|date|after:booking_start',
                'reason' => 'nullable|string',
            ]);

            // Check room availability
            $conflictingBooking = Booking::where('room_id', $validated['room_id'])
                ->where(function($query) use ($validated) {
                    $query->whereBetween('booking_start', [$validated['booking_start'], $validated['booking_end']])
                          ->orWhereBetween('booking_end', [$validated['booking_start'], $validated['booking_end']]);
                })
                ->exists();

            if ($conflictingBooking) {
                return back()->with('error', 'ห้องไม่ว่างในช่วงเวลาที่เลือก กรุณาเลือกเวลาอื่น');
            }

            // Create booking with debugging
            \Log::debug('Creating booking with data:', $validated);
            // Get room details for price calculation
            $room = Room::find($validated['room_id']);
            
            // Calculate number of days
            $start = new \DateTime($validated['booking_start']);
            $end = new \DateTime($validated['booking_end']);
            $days = $end->diff($start)->days;
            
            // Calculate total price
            $totalPrice = $room->service_rates * $days;

            $booking = new Booking();
            $booking->room_id = $validated['room_id'];
            $booking->building_id = $validated['building_id'];
            $booking->external_name = $validated['external_name'];
            $booking->external_email = $validated['external_email'];
            $booking->external_phone = $validated['external_phone'];
            $booking->booking_start = $validated['booking_start'];
            $booking->booking_end = $validated['booking_end'];
            $booking->reason = $validated['reason'];
            $booking->status_id = 1; // Pending status
            $booking->is_external = true;
            $booking->total_price = $totalPrice;
            
            // Add user_id if user is authenticated
            if (auth()->check()) {
                $booking->user_id = auth()->id();
            }

            
            // Add user_id if user is authenticated
            if (auth()->check()) {
                $booking->user_id = auth()->id();
            }
            
            if ($booking->save()) {
                \Log::info('Booking created successfully', ['booking' => $booking->toArray()]);
            } else {
                \Log::error('Failed to save booking', ['errors' => $booking->getErrors()]);
            }

            // Log successful booking
            \Log::info('Booking created successfully', ['booking_id' => $booking->id]);

            // Redirect to the specified URL
            return redirect('http://127.0.0.1:8000/booking')
                ->with('success', 'การจองห้องสำเร็จ! กรุณาตรวจสอบอีเมลของคุณ');

        } catch (\Exception $e) {
            \Log::error('Booking failed: ' . $e->getMessage(), ['request' => $request->all()]);
            return back()
                ->with('error', 'เกิดข้อผิดพลาดในการจอง: ' . $e->getMessage())
                ->withInput();
        }
    }
}
