@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 mt-14">
        <h2 class="text-2xl font-bold mb-4">จองห้อง</h2>
        <!-- Debug room data -->
        @php
            \Log::debug('Room data in booking form:', ['room' => $room]);
        @endphp
        
        <!-- Debug form submission -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form');
                form.addEventListener('submit', function(e) {
                    const roomId = document.getElementById('room_id_field').value;
                    console.log('Submitting form with room_id:', roomId);
                });
            });
        </script>

        <!-- Debug room data -->
        @php
            \Log::debug('Room data in booking form:', ['room' => $room]);
            \Log::debug('Room ID:', ['id' => $room->id]);
        @endphp

        <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->room_id }}" id="room_id_field">
            <div class="mb-4">
                <label for="room_id_field" class="block text-sm font-medium text-gray-700">ห้องที่จอง</label>
                <input type="text" value="{{ $room->room_name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
            </div>
            <input type="hidden" name="building_id" value="{{ $room->building_id }}">

            <div class="mb-4">
                <label for="external_name" class="block text-sm font-medium text-gray-700">ชื่อผู้จอง</label>
                <input type="text" name="external_name" id="external_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="external_email" class="block text-sm font-medium text-gray-700">อีเมล</label>
                <input type="email" name="external_email" id="external_email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="external_phone" class="block text-sm font-medium text-gray-700">เบอร์โทร</label>
                <input type="text" name="external_phone" id="external_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="booking_start" class="block text-sm font-medium text-gray-700">วันที่เริ่มต้น</label>
                <input type="datetime-local" name="booking_start" id="booking_start" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="booking_end" class="block text-sm font-medium text-gray-700">วันที่สิ้นสุด</label>
                <input type="datetime-local" name="booking_end" id="booking_end" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="reason" class="block text-sm font-medium text-gray-700">เหตุผลในการจอง</label>
                <textarea name="reason" id="reason" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">ยืนยันการจอง</button>
            </div>
            
            <!-- Debug form data -->
            <script>
                document.getElementById('bookingForm').addEventListener('submit', function(e) {
                    const formData = new FormData(this);
                    const data = {};
                    formData.forEach((value, key) => {
                        data[key] = value;
                    });
                    console.log('Form data being submitted:', data);
                });
            </script>
        </form>
    </div>
@endsection
