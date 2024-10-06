<div  class="our_room">
    <div class="container">
       <div class="row mg">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
          </div>
       </div>
       <div class="row mg">
          @foreach ($rooms as $room)
          <div class="col-md-4 col-sm-6">
            <div id="serv_hover"  class="room">
               <div class="room_img">
                  <figure><img src="{{ $room->image }}" alt="#" style="width: 100%;height: 10rem;"/></figure>
               </div>
               <div class="bed_room">
                  <h3>{{ $room->title }}</h3>
                  <p>{{ Str::limit($room->description, 100) }}</p>
               </div>
               <div class="main_btn">
                  <button class="btn read_more btn-sm mb-4">Room Details</button>
               </div>
            </div>
         </div>
          @endforeach
          <div class="col-md-12">
            <a class="btn1 btn btn-sm btn-info float-right" href="{{ route('our.room') }}">view more room >></a>
          </div>
         </div>
      </div>
   </div>