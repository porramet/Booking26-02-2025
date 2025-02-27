@extends('layouts.app')

@section('content')
        <!-- Main Content -->
    <div class="mt-16 flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">        
    <!-- Form Section -->
    <div class="bg-white p-6 rounded-lg shadow-lg flex-1">
     <h2 class="text-lg font-semibold mb-4">
      ผู้เข้าพักคนหลัก
      <span class="text-red-600">
       *
      </span>
     </h2>
     <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->room_id }}">
        <input type="hidden" name="building_id" value="{{ $room->building_id }}">

        <!-- ห้องที่จอง -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="room-name">ห้องที่จอง</label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
                id="room-name" type="text" value="{{ $room->room_name }}" readonly>
        </div>

        <!-- ชื่อผู้จอง -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="first-name">ชื่อผู้จอง</label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
                id="first-name" name="external_name" type="text" required>
        </div>

        <!-- อีเมล -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="email">อีเมล</label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
                id="email" name="external_email" type="email" required>
        </div>

        <!-- เบอร์โทร -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="phone">เบอร์โทร</label>
            <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" 
                id="phone" name="external_phone" type="text" required>
        </div>

        <!-- เลือกช่วงวันที่ -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="booking_range">เลือกวันที่</label>
            <input type="text" name="booking_range" id="booking_range" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" readonly required>
            <input type="hidden" name="booking_start" id="booking_start" value="">
            <input type="hidden" name="booking_end" id="booking_end" value="">
        </div>

        <!-- เหตุผลในการจอง -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="reason">เหตุผลในการจอง</label>
            <textarea name="reason" id="reason" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" rows="3"></textarea>
        </div>

        <!-- Temporary Button for Debugging -->
        <button type="button" id="debugButton" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Debug Booking Start/End</button>

        <!-- ปุ่มยืนยันการจอง -->
        <div class="flex justify-between mt-4">
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg">ยกเลิก</button>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">ยืนยันการจอง</button>
        </div>
    </form>
    </div>
    <!-- Booking Summary -->
    <div class="space-y-4">
     <!-- Date Selection -->
     <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center space-y-4 border border-gray-300">
      <div class="flex items-center space-x-4">
       <div class="text-center">
        <div class="text-lg font-semibold">
         จ. ที่ 5 พ.ค.
        </div>
        <div class="text-sm text-gray-500">
         เช็คอิน
        </div>
       </div>
       <div class="text-2xl font-semibold">
        →
       </div>
       <div class="text-center">
        <div class="text-lg font-semibold">
         พ. ที่ 7 พ.ค.
        </div>
        <div class="text-sm text-gray-500">
         เช็คเอาท์
        </div>
       </div>
       <div class="text-center">
        <div class="text-lg font-semibold">
         2
        </div>
        <div class="text-sm text-gray-500">
         คืน
        </div>
       </div>
      </div>
      <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
       เลือกวันจอง 
      </button>
     </div>
     <!-- Hotel Information -->
     <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
      <div class="p-4">
       <div class="flex">
        <img alt="Image of Wyndham Ka Eo Kai" class="w-24 h-24 rounded-md" height="100" src="https://storage.googleapis.com/a1aa/image/UNcTXkiMcW7utvAmUbKj2fCN2pO_aUI8xvnt9Ir2zjk.jpg" width="100"/>
        <div class="ml-4">
         <h2 class="text-lg font-bold">
          วินด์แฮม คา เอโอ คาย
         </h2>
         <p class="text-sm text-gray-600">
          (Wyndham Ka Eo Kai)
         </p>
         <div class="flex items-center mt-1">
          <span class="text-orange-500">
           <i class="fas fa-star">
           </i>
          </span>
          <span class="text-orange-500">
           <i class="fas fa-star">
           </i>
          </span>
          <span class="text-orange-500">
           <i class="fas fa-star">
           </i>
          </span>
          <span class="text-orange-500">
           <i class="fas fa-star">
           </i>
          </span>
          <span class="text-orange-500">
           <i class="fas fa-star-half-alt">
           </i>
          </span>
         </div>
        </div>
       </div>
       <div class="mt-4">
        <p class="text-blue-600 text-lg font-semibold">
         8.1 ดีเยี่ยม
        </p>
        <p class="text-gray-600 text-sm">
         573 รีวิว
        </p>
        <p class="text-gray-600 text-sm mt-2">
         3970 Wyllie Road, ปรินซ์วิลล์, ปรินซ์วิลล์, ฮาวาย, สหรัฐอเมริกา
        </p>
        <a class="text-blue-600 text-sm mt-1 inline-block" href="#">
         ดูสถานที่ใกล้เคียง
        </a>
       </div>
       <div class="mt-4">
        <p class="text-gray-600 text-sm">
         นโยบายการยกเลิกการจอง
        </p>
       </div>
      </div>
      <div class="border-t p-4 bg-gray-50">
       <div class="flex">
        <img alt="Image of the room" class="w-24 h-24 rounded-md" height="100" src="https://storage.googleapis.com/a1aa/image/sCXAtIypiJxrFSZQfWskD7572SuiN897ikUl-5mX__8.jpg" width="100"/>
        <div class="ml-4">
         <p class="text-gray-800 text-sm">
          1 x ห้องพัก 1 ห้องนอน (1 Bedroom Suite)
         </p>
         <p class="text-gray-600 text-sm mt-1">
          97 ตร.ม. | ผู้เข้าพัก: ผู้ใหญ่ 3 คน
         </p>
         <p class="text-gray-600 text-sm">
          ผู้เข้าพักสูงสุด: ผู้ใหญ่ 2 คน
         </p>
        </div>
       </div>
       <div class="mt-4">
        <div class="flex items-center text-green-600 text-sm">
         <i class="fas fa-check-circle">
         </i>
         <p class="ml-2">
          มีบริการรับที่พักฟรี
         </p>
        </div>
        <div class="flex items-center text-gray-600 text-sm mt-1">
         <i class="fas fa-bed">
         </i>
         <p class="ml-2">
          1 เตียงคิงไซส์ หรือ 1 โซฟาเบด
         </p>
        </div>
        <div class="flex items-center text-red-600 text-sm mt-1">
         <i class="fas fa-exclamation-circle">
         </i>
         <p class="ml-2">
          ห้องสุดท้ายของเราในราคานี้สำหรับวันเข้าพักที่เลือก - รีบจอง!
         </p>
        </div>
       </div>
      </div>
     </div>
     <!-- Price Information -->
     <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
      <div class="flex justify-between items-center mb-4">
       <div class="text-gray-700">
        <p>
         ราคาที่พัก (ห้องพัก 1 ห้อง x 2 คืน)
        </p>
        <p>
         ราคาห้องพัก (ห้องพัก 1 ห้อง x 2 คืน)
        </p>
       </div>
       <div class="text-right">
        <p class="text-gray-500 line-through">
         ฿ 25,587.47
        </p>
        <p class="text-gray-700">
         ฿ 15,862.63
        </p>
       </div>
      </div>
      <div class="flex justify-between items-center mb-4">
       <div class="text-gray-700 font-semibold">
        ราคาที่จ่าย
       </div>
       <div class="text-right text-gray-700 font-semibold">
        ฿ 18,711.81
       </div>
      </div>
      <div class="text-gray-500 text-sm mb-4">
       รวม: Tax ฿ 1,626.08, ภาษีท้องถิ่น ฿ 475.82, Local Council Tax ฿ 747.28
      </div>
      <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
       <div class="flex items-center">
        <i class="fas fa-info-circle mr-2">
        </i>
        <div>
         <p class="font-semibold">
          ราคาดีที่สุด! ที่ไหนถูกกว่า เราลดให้เท่ากับไปเลย
         </p>
        </div>
       </div>
      </div>
      <div class="text-gray-700 text-sm">
       ดีอะไรอย่างนี้ :) จองที่พักนี้ได้ส่วนลดตั้ง ฿ 9,724.84
      </div>
     </div>
    </div>
   </div>
  </div>
    <!-- Litepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css">
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const picker = new Litepicker({
                element: document.getElementById('booking_range'),
                singleMode: false,
                numberOfMonths: 2,
                numberOfColumns: 2,
                format: 'D MMM YYYY',
                lang: "th-TH",
                autoApply: true,
                minDate: new Date(),
                onSelect: function(date1, date2) {
                    console.log('Selected Start Date:', date1 ? date1.format('YYYY-MM-DD') : '');
                    console.log('Selected End Date:', date2 ? date2.format('YYYY-MM-DD') : '');
                    document.getElementById('booking_start').value = date1 ? date1.format('YYYY-MM-DD') : '';
                    document.getElementById('booking_end').value = date2 ? date2.format('YYYY-MM-DD') : '';
                    document.getElementById('booking_range').value = date1 && date2 ? date1.format('D MMM YYYY') + ' - ' + date2.format('D MMM YYYY') : '';
                }
            });
        });

        // Debugging button functionality
        document.getElementById('debugButton').addEventListener('click', function() {
            console.log('Booking Start:', document.getElementById('booking_start').value);
            console.log('Booking End:', document.getElementById('booking_end').value);
        });
    </script>
@endsection
