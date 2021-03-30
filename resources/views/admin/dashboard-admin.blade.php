@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Booking Setup</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Bookings</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
             @if ($message = Session::get('success'))
                    <div class="alert alert-success" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @elseif ($message = Session::get('danger'))
                    <div class="alert alert-danger" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @endif
            <div class="content-body">
                <a class="btn btn-success" style="color: white;" data-toggle="modal" data-target="#addBooking">
                  <i class="fa fa-plus"></i> Add Booking
                </a>
                <a class="btn btn-danger" style="color: white; display: none;" data-toggle="modal" data-target="#remstock_unused">
                  <i class="fa fa-times"></i> Remove Booking
                </a>
                <a class="btn btn-primary" style="float:right;color: white; display: none;" data-toggle="modal" data-target="#logbook">
                  <i class="fa fa-book"></i> Booking Log
                </a>
                <br>
                <br>

                <!-- Responsive tables start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-content">
                                <table class="table" id="myTable">
                            <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>BOOKING DATE</th>
                                            <th>AGENT</th>
                                            <th>BLOCK</th>
                                            <th>PLOT SIZE</th>
                                            <th>UNIT NO</th>
                                            <th>APPLICANT NAME</th>
                                            <th>CNIC</th>
                                            <th>PHONE NO</th>
                                            <th>BOOKING AMOUNT</th>
                                            <th>REMAINING AMOUNT</th>
                                            <th>STATUS</th>
                                            <th>CREATED AT</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php $i = 1; ?>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td class="product-name">{{ date('d-m-Y',strtotime($d->booking_date)) }}</td>
                                    <td class="product-name">{{ $d->agent_name }}</td>
                                    <td class="product-name">{{ $d->block_name }}</td>
                                    <td class="product-name">{{ $d->plot_size }} Square Yards (Gazz)</td>
                                    <td class="product-name">{{ $d->unit_no }}</td>
                                    <td class="product-name">{{ $d->applicant_name }}</td>
                                    <td class="product-name">{{ $d->cnic }}</td>
                                    <td class="product-name">{{ $d->phone_no }}</td>
                                    <td class="product-name">{{ number_format($d->booking_amount) }}</td>
                                    <td class="product-name">{{ number_format($d->remaining_amount) }}</td>
                                    <td class="product-name">{{ $d->status }}</td>
                                    <td class="product-name">{{ $d->created_at }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.edit', $d->id) }}" id="{{ $d->id }}" class="btn btn-secondary dynamic_booking" style="color: white;" data-toggle="modal" data-target="#viewBooking">
                                          <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('dashboard.edit', $d->id) }}" class="btn btn-info" style="color: white;">
                                          <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('booking_del', $d->id) }}" class="btn btn-danger" style="color: white;">
                                          <i class="fa fa-trash"></i> Cancel
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                
                </div>
                </div>
                <!-- Responsive tables end -->

            </div>
        </div>



<!-- Add Booking Modal -->
<div class="modal fade" id="addBooking" style="margin-top: 20px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Booking</h5>
        <button type="button" style="background-color: #f3080d;" class="close" data-dismiss="modal" aria-label="Close">
          <span style="background-color: #f3080d; color:white;">&times;</span>
        </button>
      </div>
        <form action="{{route('add_booking')}}" method="POST">
          @csrf
      <div class="modal-body">
            <label for="booking_date"><strong>Booking Date</strong></label>
            <input id="booking_date" placeholder="Enter Amount" class="form-control" type="date" name="booking_date" required>
            <label for="agent_id"><strong>Select Agent</strong></label>
            <select id="agent_id" name="agent_id" class="form-control" required>
                <option value="">- Select Agent -</option>
                @foreach($agents as $agent)
                <option value="{{$agent->id}}">{{$agent->name}}</option>
                @endforeach
            </select>
            <label for="block_id"><strong>Select Block</strong></label>
            <select id="block_id" name="block_id" class="form-control" required>
                <option value="">- Select Block -</option>
                @foreach($blocks as $block)
                <option value="{{$block->id}}">{{$block->name}}</option>
                @endforeach
            </select>
            <label for="plot_size"><strong>Select Plot Size</strong></label>
            <select id="plot_size" name="plot_size" class="form-control" required>
                <option value="">- Select Plot Size -</option>
                <option value="200">200 Square Yards (Gazz)</option>
                <option value="500">500 Square Yards (Gazz)</option>
            </select>
            <label for="unit_no"><strong>Select Unit-No</strong></label>
            <select id="unit_no" name="unit_no" class="form-control" required>
                <option value="">- Select Unit-No -</option>
                @for($i = 1; $i <= 61; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <label for="applicant_name"><strong>Applicant Name</strong></label>
            <input id="applicant_name" placeholder="Enter Applicant Name" class="form-control" type="text" name="applicant_name" required>
            <label for="cnic"><strong>CNIC</strong></label>
            <input id="cnic" placeholder="Enter CNIC Number" class="form-control" type="text" name="cnic">
            <label for="phone_no"><strong>Phone Number</strong></label>
            <input id="phone_no" placeholder="Enter Phone Number" class="form-control" type="number" name="phone_no" required>
            <label for="booking_amount"><strong>Booking Amount</strong></label>
            <input id="booking_amount" placeholder="Enter Booking Amount" class="form-control" type="number" name="booking_amount" required>
            <label for="remaining_amount"><strong>Remaining Amount</strong></label>
            <input id="remaining_amount" placeholder="Enter Remaining Amount" class="form-control" type="number" name="remaining_amount">
            <label for="status"><strong>Status</strong></label>
            <select id="status" name="status" class="form-control" required>
                <option value="">- Select Block -</option>
                <option value="Booked">Booked</option>
                <option value="Unbooked">Unbooked</option>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Booking</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- //Add Booking Modal -->

<!-- View Booking Modal -->
<div class="modal fade" id="viewBooking" style="margin-top: 100px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content " id="modal_content">
      
    </div>
  </div>
</div>
<!-- //Add Booking Modal -->


<script>
    $('#agent_id').select2();
    $('#block_id').select2();
    $('#unit_no').select2();

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function(){

  $('.dynamic_booking').click(function(){
   
    var select = $(this).attr("id");
    var _token = $('input[name="_token"]').val();
 
    $.ajax({
     url:"{{ route('dynamicdependent.booking_details') }}",
     post:"POST",
     beforeSend: function (xhr) {
           var token = $('meta[name="csrf_token"]').attr('content');

           if (token) {
                 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           }
       },
     data:{
     select:select
     },      
     success:function(result)
     {
      $('#modal_content').html(result);
     }
 
    });
   
    });
});

</script>     

@endsection