@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>จัดการการจองห้อง</h2>
        <form action="{{ route('booking_db') }}" method="GET" class="d-flex">
            <input class="search-bar" placeholder="ค้นหาการจอง" type="text" name="search" value="{{ request('search') }}"/>
            <button type="submit" class="icon-btn">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-book icon"></i>
                <div class="details">
                    <h3>{{ $totalBookings }}</h3>
                    <p>จำนวนการจองทั้งหมด</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-clock icon"></i>
                <div class="details">
                    <h3>{{ $pendingApprovals }}</h3>
                    <p>จำนวนการจองที่รออนุมัติ</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-check icon"></i>
                <div class="details">
                    <h3>{{ $approvedBookings }}</h3>
                    <p>จำนวนการจองที่อนุมัติแล้ว</p>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">รหัสการจอง</th>
                    <th class="px-4 py-2 border">รหัสผู้ใช้</th>
                    <th class="px-4 py-2 border">ชื่อผู้จอง</th>
                    <th class="px-4 py-2 border">รหัสห้อง</th>
                    <th class="px-4 py-2 border">เวลาเริ่มต้น</th>
                    <th class="px-4 py-2 border">เวลาสิ้นสุด</th>
                    <th class="px-4 py-2 border">สถานะการชำระเงิน</th>
                    <th class="px-4 py-2 border">สถานะการอนุมัติ</th>
                    <th class="px-4 py-2 border">การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $booking->id }}</td>
                    <td class="px-4 py-2 border">{{ $booking->user->name }}</td>
                    <td class="px-4 py-2 border">{{ $booking->external_name }}</td>
                    <td class="px-4 py-2 border">{{ $booking->room_id }}</td>
                    <td class="px-4 py-2 border">{{ $booking->booking_start }}</td>
                    <td class="px-4 py-2 border">{{ $booking->booking_end }}</td>
                    <td class="px-4 py-2 border">
                        <select class="border border-gray-300 rounded px-2 py-1">
                            <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>ชำระแล้ว</option>
                            <option value="pending" {{ $booking->payment_status == 'pending' ? 'selected' : '' }}>รอดำเนินการ</option>
                            <option value="cancelled" {{ $booking->payment_status == 'cancelled' ? 'selected' : '' }}>ยกเลิก</option>
                        </select>
                    </td>
                    <td class="px-4 py-2 border">
                        <select class="border border-gray-300 rounded px-2 py-1">
                            <option value="approved" {{ $booking->status_id == 'approved' ? 'selected' : '' }}>อนุมัติ</option>
                            <option value="not_approved" {{ $booking->status_id == 'not_approved' ? 'selected' : '' }}>ไม่อนุมัติ</option>
                        </select>
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i> ดูรายละเอียด</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
