@extends('layouts.main')

@section('content')
<<<<<<< HEAD
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
=======
<div>
    <div class="col-md-10 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>ห้องว่าง</h2>
            <div class="d-flex align-items-center">
                <input class="search-bar" placeholder="ค้นหาบางอย่าง" type="text"/>
                <button class="icon-btn">
                    <i class="fas fa-cog"></i>
                </button>
                <button class="icon-btn">
                    <i class="fas fa-bell"></i>
                </button>
                <img alt="Profile image" class="profile-img" src="https://placehold.co/40x40"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>ห้องว่าง</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>อาคาร</th>
                                    <th>ห้อง</th>
                                    <th>ผู้จอง</th>
                                    <th>วันที่จอง</th>
                                    <th>เวลาเริ่ม</th>
                                    <th>เวลาสิ้นสุด</th>
                                    <th>สถานะ</th>
                                    <th>วัตถุประสงค์</th>
                                    <th>จำนวนผู้เข้าร่วม</th>
                                    <th>แผนก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->room->room_name ?? 'N/A' }}</td>
                                    <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                    <td>{{ $booking->booking_date }}</td>
                                    <td>{{ $booking->start_time }}</td>
                                    <td>{{ $booking->end_time }}</td>
                                    <td>{{ $booking->status->status_name ?? 'N/A' }}</td>
                                    <td>{{ $booking->purpose ?? 'N/A' }}</td>
                                    <td>{{ $booking->attendees ?? 'N/A' }}</td>
                                    <td>{{ $booking->department ?? 'N/A' }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#" tabindex="-1">ก่อนหน้า</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">ถัดไป</a></li>
                            </ul>
                        </nav>
                    </div>
>>>>>>> b260e42e9e58cd2b5bb8aadd1b08e46039d1650e
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
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
=======
</div>
>>>>>>> b260e42e9e58cd2b5bb8aadd1b08e46039d1650e
@endsection
