@extends('layouts.main')

@section('content')
<div>
    <div class="col-md-10 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
         <h2>
          ภาพรวม
         </h2>
         <div class="d-flex align-items-center">
          <input class="search-bar" placeholder="ค้นหาบางอย่าง" type="text"/>
          <button class="icon-btn">
           <i class="fas fa-cog">
           </i>
          </button>
          <button class="icon-btn">
           <i class="fas fa-bell">
           </i>
          </button>
          <img alt="Profile image" class="profile-img" src="https://placehold.co/40x40"/>
         </div>
        </div>
        <div class="row">
         <div class="col-md-8">
          <div class="card mb-4">
           <div class="card-header d-flex justify-content-between align-items-center">
            <h5>
             การจองล่าสุด
            </h5>
            <a href="#">
             ดูทั้งหมด
            </a>
           </div>
           <div class="card-body">
            <div class="carousel-controls">
             <button class="icon-btn" id="prevBtn">
              <i class="fas fa-chevron-left">
              </i>
             </button>
             <div class="booking-carousel" id="bookingCarousel">
              <div class="card card-blue">
               <div class="card-body text-center">
                <img alt="ภาพห้องประชุม A" class="mb-3" src="https://placehold.co/100x100"/>
                <p>
                 ห้องประชุม A
                </p>
                <p>
                 อาคาร 1
                </p>
                <p>
                 สมชาย ใจดี
                </p>
                <button class="btn btn-light btn-sm" onclick="showDetails('A', 'สมชาย ใจดี', '12/22', '10:00 - 12:00')">
                 ดูรายละเอียด
                </button>
               </div>
              </div>
              <div class="card">
               <div class="card-body text-center">
                <img alt="ภาพห้องประชุม B" class="mb-3" src="https://placehold.co/100x100"/>
                <p>
                 ห้องประชุม B
                </p>
                <p>
                 อาคาร 2
                </p>
                <p>
                 สมหญิง ใจดี
                </p>
                <button class="btn btn-light btn-sm" onclick="showDetails('B', 'สมหญิง ใจดี', '01/24', '14:00 - 16:00')">
                 ดูรายละเอียด
                </button>
               </div>
              </div>
              <div class="card">
               <div class="card-body text-center">
                <img alt="ภาพห้องประชุม C" class="mb-3" src="https://placehold.co/100x100"/>
                <p>
                 ห้องประชุม C
                </p>
                <p>
                 อาคาร 3
                </p>
                <p>
                 สมหมาย ใจดี
                </p>
                <button class="btn btn-light btn-sm" onclick="showDetails('C', 'สมหมาย ใจดี', '02/15', '09:00 - 11:00')">
                 ดูรายละเอียด
                </button>
               </div>
              </div>
              <div class="card">
               <div class="card-body text-center">
                <img alt="ภาพห้องประชุม D" class="mb-3" src="https://placehold.co/100x100"/>
                <p>
                 ห้องประชุม D
                </p>
                <p>
                 อาคาร 4
                </p>
                <p>
                 สมศรี ใจดี
                </p>
                <button class="btn btn-light btn-sm" onclick="showDetails('D', 'สมศรี ใจดี', '03/10', '13:00 - 15:00')">
                 ดูรายละเอียด
                </button>
               </div>
              </div>
             </div>
             <button class="icon-btn" id="nextBtn">
              <i class="fas fa-chevron-right">
              </i>
             </button>
            </div>
           </div>
          </div>
          <div class="row">
           <div class="col-md-4">
            <div class="stat-card">
             <div class="icon">
              <i class="fas fa-door-open">
              </i>
             </div>
             <div class="details">
              <h3>
               10
              </h3>
              <p>
               จำนวนห้อง
              </p>
             </div>
            </div>
           </div>
           <div class="col-md-4">
            <div class="stat-card">
             <div class="icon">
              <i class="fas fa-users">
              </i>
             </div>
             <div class="details">
              <h3>
               50
              </h3>
              <p>
               จำนวนผู้ใช้
              </p>
             </div>
            </div>
           </div>
           <div class="col-md-4">
            <div class="stat-card">
             <div class="icon">
              <i class="fas fa-calendar-check">
              </i>
             </div>
             <div class="details">
              <h3>
               120
              </h3>
              <p>
               จำนวนการจองห้อง
              </p>
             </div>
            </div>
           </div>
          </div>
         </div>
         <div class="col-md-4">
          <div class="card mb-4">
           <div class="card-header">
            <h5>
            ดำเนินการเสร็จสิ้นล่าสุด
            </h5>
           </div>
           <div class="card-body">
            <div class="transaction-item">
             <div class="d-flex align-items-center">
              <div class="icon bg-warning text-white">
               <i class="fas fa-calendar-alt">
               </i>
              </div>
              <div class="details">
               <p class="mb-0">
                ห้องประชุม A
               </p>
               <small>
                25 มกราคม 2021
               </small>
              </div>
             </div>
             <div class="amount negative">
              10:00 - 12:00
             </div>
            </div>
            <div class="transaction-item">
             <div class="d-flex align-items-center">
              <div class="icon bg-primary text-white">
               <i class="fas fa-calendar-alt">
               </i>
              </div>
              <div class="details">
               <p class="mb-0">
                ห้องประชุม B
               </p>
               <small>
                25 มกราคม 2021
               </small>
              </div>
             </div>
             <div class="amount positive">
              14:00 - 16:00
             </div>
            </div>
            <div class="transaction-item">
             <div class="d-flex align-items-center">
              <div class="icon bg-info text-white">
               <i class="fas fa-calendar-alt">
               </i>
              </div>
              <div class="details">
               <p class="mb-0">
                ห้องประชุม C
               </p>
               <small>
                25 มกราคม 2021
               </small>
              </div>
             </div>
             <div class="amount positive">
              16:00 - 18:00
             </div>
            </div>
           </div>
          </div>
          
          <div class="card mb-4">
           <div class="card-header">
            <h5>
             สถิติการจอง
            </h5>
           </div>
           <div class="card-body">
            <div class="chart-container">
             <img alt="กราฟวงกลมแสดงสถิติการจอง" src="https://placehold.co/300x200"/>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
</div>
@endsection

<script>
    document.getElementById('nextBtn').addEventListener('click', function() {
         document.getElementById('bookingCarousel').scrollBy({ left: 150, behavior: 'smooth' });
     });
 
     document.getElementById('prevBtn').addEventListener('click', function() {
         document.getElementById('bookingCarousel').scrollBy({ left: -150, behavior: 'smooth' });
     });
 
     function showDetails(room, booker, date, time) {
         alert(`ห้อง: ${room}\nผู้จอง: ${booker}\nวันที่จอง: ${date}\nเวลา: ${time}`);
     }
</script>

<style>
    body {
             font-family: 'Arial', sans-serif;
             background-color: #f8f9fa;
        
         }
         .content {
             padding: 20px;
         }
         .card {
             border-radius: 10px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
             transition: transform 0.2s, box-shadow 0.2s;
         }
         .card:hover {
             transform: translateY(-5px);
             box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
         }
         .card-header {
             background-color: #fff;
             border-bottom: none;
         }
         .card-body {
             padding: 20px;
         }
         .card-footer {
             background-color: #fff;
             border-top: none;
         }
         .card-blue {
             background: linear-gradient(135deg, #fff);
             color: #fff;
         }
         .card-blue .card-body {
             padding: 20px;
         }
         .card-blue .card-footer {
             background-color: transparent;
         }
         .chart-container {
             position: relative;
             height: 200px;
         }
         .profile-img {
             width: 40px;
             height: 40px;
             border-radius: 50%;
         }
         .search-bar {
             background-color: #f1f3f4;
             border: none;
             border-radius: 20px;
             padding: 10px 20px;
             width: 100%;
         }
         .search-bar:focus {
             outline: none;
             box-shadow: none;
         }
         .icon-btn {
             background-color: #f1f3f4;
             border: none;
             border-radius: 50%;
             padding: 10px;
             margin-left: 10px;
         }
         .icon-btn i {
             color: #6c757d;
         }
         .transaction-item {
             display: flex;
             align-items: center;
             justify-content: space-between;
             padding: 10px 0;
             border-bottom: 1px solid #e0e0e0;
         }
         .transaction-item:last-child {
             border-bottom: none;
         }
         .transaction-item .icon {
             width: 40px;
             height: 40px;
             border-radius: 50%;
             display: flex;
             align-items: center;
             justify-content: center;
             margin-right: 10px;
         }
         .transaction-item .icon i {
             font-size: 20px;
         }
         .transaction-item .details {
             flex-grow: 1;
         }
         .transaction-item .amount {
             font-weight: 500;
         }
         .transaction-item .amount.negative {
             color: #dc3545;
         }
         .transaction-item .amount.positive {
             color: #28a745;
         }
         .stat-card {
             display: flex;
             align-items: center;
             justify-content: space-between;
             padding: 20px;
             border-radius: 10px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
             margin-bottom: 20px;
             transition: transform 0.2s, box-shadow 0.2s;
         }
         .stat-card:hover {
             transform: translateY(-5px);
             box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
         }
         .stat-card .icon {
             font-size: 40px;
             color: #6c757d;
         }
         .stat-card .details {
             text-align: right;
         }
         .stat-card .details h3 {
             margin: 0;
             font-size: 24px;
         }
         .stat-card .details p {
             margin: 0;
             color: #6c757d;
         }
         .booking-carousel {
             display: flex;
             overflow-x: auto;
             scroll-snap-type: x mandatory;
         }
         .booking-carousel .card {
             flex: 0 0 auto;
             width: 150px;
             margin-right: 10px;
             scroll-snap-align: start;
         }
         .booking-carousel .card img {
             width: 100%;
             height: auto;
         }
         .carousel-controls {
             display: flex;
             justify-content: space-between;
             align-items: center;
         }
   </style>