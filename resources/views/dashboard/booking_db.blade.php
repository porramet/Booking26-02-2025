@extends('layouts.main')

@section('content')
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
