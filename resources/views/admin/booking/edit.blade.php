@extends('admin.layouts.master')
<style type="text/css">
    #myFileInput {
        display:none;
    }
</style>
@section('content')


        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Edit Booking</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Booking Side</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Booking</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Booking details below</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('booking_up', $booking->id) }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ date('Y-m-d',strtotime($booking->booking_date)) }}">
                                                            <label for="booking_date">Booking Date </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <label for="agent_id">Select Agent</label>
                                                            <select class="form-control" id="agent_id" name="agent_id">
                                                                <option>- Select Agent -</option>
                                                                @foreach($agents as $agent)
                                                                @if($agent->id == $booking->agent_id)
                                                                <option selected value="{{ $agent->id }}" >{{ $agent->name }}</option>
                                                                @else
                                                                <option value="{{ $agent->id }}" >{{ $agent->name }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <label for="block_id">Select Block</label>
                                                            <select class="form-control" id="block_id" name="block_id">
                                                                <option>- Select Agent -</option>
                                                                @foreach($blocks as $block)
                                                                @if($block->id == $booking->block_id)
                                                                <option selected value="{{ $block->id }}" >{{ $block->name }}</option>
                                                                @else
                                                                <option value="{{ $block->id }}" >{{ $block->name }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                        
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <label for="plot_size">Select Plot Size</label>
                                                            <select id="plot_size" name="plot_size" class="form-control" required>
                                                                <option value="">- Select Plot Size -</option>
                                                                @if($booking->plot_size == '200')
                                                                <option value="200" selected>200 Square Yards (Gazz)</option>
                                                                <option value="500">500 Square Yards (Gazz)</option>
                                                                @else
                                                                <option value="200">200 Square Yards (Gazz)</option>
                                                                <option value="500" selected>500 Square Yards (Gazz)</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <label for="agent_id">Select Unit-No</label>
                                                            <select id="unit_no" name="unit_no" class="form-control" required>
                                                                <option value="">- Select Unit-No -</option>
                                                                <option value="{{$booking->unit_no}}" selected>{{$booking->unit_no}}</option>
                                                                @for($i = 1; $i <= 61; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="applicant_name" name="applicant_name" value="{{ $booking->applicant_name }}">
                                                            <label for="applicant_name">Applicant Name </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="cnic" name="cnic" value="{{ $booking->cnic }}">
                                                            <label for="cnic">CNIC </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ $booking->phone_no }}">
                                                            <label for="phone_no">Phone Number </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="number" class="form-control" id="booking_amount" name="booking_amount" value="{{ $booking->booking_amount }}">
                                                            <label for="booking_amount">Booking Amount </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" value="{{ $booking->remaining_amount }}">
                                                            <label for="remaining_amount">Remaining Amount </label>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <select id="status" name="status" class="form-control" required>
                                                                <option value="">- Select Block -</option>
                                                                @if($booking->status == 'Booked')
                                                                    <option value="Booked" selected>Booked</option>
                                                                    <option value="Unbooked">Unbooked</option>
                                                                @else
                                                                    <option value="Booked" >Booked</option>
                                                                    <option value="Unbooked" selected>Unbooked</option>
                                                                @endif
                                                            </select>
                                                            <label for="status">Status</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Floating Label Form section end -->

            </div>
        </div>
<script type="text/javascript">
    $('#agent_id').select2();
    $('#block_id').select2();
    $('#unit_no').select2();
</script>
 @endsection