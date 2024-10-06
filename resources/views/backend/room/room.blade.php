@extends('backend.layout.app')

@section('content')
@session('success')
    <script>
        successToast("{{ session('success') }}");
    </script>
@endsession
<div class="container-fluid pt-4 px-4">
    <div class="bg">
        <div class="px-4 py-4">
            <div class="d-flex justify-content-between">
                <h4>Room</h4>
                <a href="{{ route('roomCreate') }}" class="btn btn-primary ">Create</a>
            </div><hr>

            <div class="py-1 table-responsive overflow">
              <table class="table" id="myTable">
                <thead>
                   <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Wifi</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                    <tr>
                      <td>{{ $room->title }}</td>
                      <td>{{ Str::limit($room->description, 30) }}</td>
                      <td>{{ $room->price }}</td>
                      <td>{{ $room->wifi }}</td>
                      <td>{{ $room->room_type }}</td>
                      <td>
                        <img src="{{ $room->image }}" alt="" width="50" height="40">
                      </td>
                      <td class="d-flex gap-2">
                        <a href="{{ route('roomEdit', $room->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a onclick="deleteData(event)" href="{{ route('roomDelete', $room->id) }}" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endSection

@section('script')

<script>
  //Datatable
  let table = new DataTable('#myTable', {
    lengthMenu: [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, 'All']
      ]
  });
 
  //Delete
   function deleteData(e){
     e.preventDefault();
     var url = e.currentTarget.getAttribute('href');
     
     swal({
       title: "Are you sure?",
       text: "Once deleted, you will not be able to recover this data!",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willCancel) => {
       if (willCancel) {
         window.location.href = url;
       } else {
         swal("Your imaginary file is safe!");
       }
     });
   }
 </script>
@endsection