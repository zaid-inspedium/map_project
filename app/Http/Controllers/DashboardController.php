<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Agent;
use App\Models\Block;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\SystemSetting;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $agents = Agent::get();
        $blocks = Block::get();

        $check_superadminrole = SystemSetting::where('setting_name','=','SuperAdmin_role')->first();
        $check_sysadminrole = SystemSetting::where('setting_name','=','SystemAdmin_role')->first();

        if(Auth::user()->role_id == $check_superadminrole->setting_option || Auth::user()->role_id == $check_sysadminrole->setting_option){

          //superadmin or systemadmin logged in

          $data = Booking::select('bookings.id',
            'bookings.booking_date',
            'agents.name as agent_name',
            'blocks.name as block_name',
            'bookings.plot_size',
            'bookings.unit_no',
            'bookings.applicant_name',
            'bookings.cnic',
            'bookings.phone_no',
            'bookings.plot_type',
            'bookings.unit_specs',
            'bookings.mode',
            'bookings.booking_amount',
            'bookings.remaining_amount',
            'bookings.status',
            'bookings.created_at')
                        ->leftjoin('agents','agents.id','=','bookings.agent_id')
                        ->leftjoin('blocks','blocks.id','=','bookings.block_id')
                        ->orderby('bookings.booking_date','DESC')
                        ->get();

        }else{

          $data = Booking::select('bookings.id',
            'bookings.booking_date',
            'agents.name as agent_name',
            'blocks.name as block_name',
            'bookings.plot_size',
            'bookings.unit_no',
            'bookings.applicant_name',
            'bookings.cnic',
            'bookings.phone_no',
            'bookings.plot_type',
            'bookings.unit_specs',
            'bookings.mode',
            'bookings.booking_amount',
            'bookings.remaining_amount',
            'bookings.status',
            'bookings.created_at')
                        ->leftjoin('agents','agents.id','=','bookings.agent_id')
                        ->leftjoin('blocks','blocks.id','=','bookings.block_id')
                        ->where('bookings.created_by','=',Auth::user()->id)
                        ->orderby('bookings.booking_date','DESC')
                        ->get();



        }

        // print_r($data);
        return view('admin.dashboard-admin', compact('data','agents','blocks'));
        
    }

    /**
     * Show the form for add_booking a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_booking(request $request)
    {
        $new = new Booking;

        $new->booking_date = $request->booking_date;
        $new->agent_id = $request->agent_id;
        $new->block_id = $request->block_id;
        $new->plot_size = $request->plot_size;
        $new->unit_no = $request->unit_no;
        $new->applicant_name = $request->applicant_name;
        $new->cnic = $request->cnic;
        $new->phone_no = $request->phone_no;
        $new->booking_amount = $request->booking_amount;
        $new->remaining_amount = $request->remaining_amount;
        $new->status = $request->status;
        $new->created_by = Auth::user()->id;

        $new->save();

        return redirect()->route('dashboard.index')->with('success','Booking has been Added');
    }

    /**
     * Show the form for booking_details a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function booking_details(Request $request)
    {
        $id = $request->get('select');
        $booking = Booking::select('bookings.id',
            'bookings.booking_date',
            'agents.name as agent_name',
            'blocks.name as block_name',
            'bookings.plot_size',
            'bookings.unit_no',
            'bookings.applicant_name',
            'bookings.cnic',
            'bookings.phone_no',
            'bookings.booking_amount',
            'bookings.remaining_amount',
            'bookings.status',
            'bookings.created_at')
                        ->leftjoin('agents','agents.id','=','bookings.agent_id')
                        ->leftjoin('blocks','blocks.id','=','bookings.block_id')
                        ->where('bookings.id',$id)
                        ->first();

        $output = '<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Booking Details</h5>
                <button type="button" style="background-color: #f3080d;" class="close" data-dismiss="modal" aria-label="Close">
                  <span style="background-color: #f3080d; color:white;">&times;</span>
                </button>
              </div>
          <div class="modal-body">
            
            
            <div class="row">
              <div class="col-4"><p for="booking_date"><strong>Booking Date</strong></p></div>
              <div class="col-8"> <span class="text-right font-medium-3 mx-2">'. date('d.m.Y',strtotime($booking->booking_date)) .' </span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="agent_id"><strong>Agent </strong> </p></div>
              <div class="col-8"> <span class="text-right font-large-1 mx-2"><strong>'. $booking->agent_name .' </strong></span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="block_id"><strong>Block</strong> </p></div>
              <div class="col-8"> <span class="text-right font-medium-3 mx-2">'. $booking->block_name .' </span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="plot_size"><strong>Plot Size</strong> </p></div>
              <div class="col-8"> <span class="text-right font-medium-2 mx-2">'. $booking->plot_size .'  <em class="text-primary font-small-2">yd2</em> </span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="unit_no"><strong>Unit-No</strong> </p></div>
              <div class="col-8"> <span class="text-right font-medium-2 mx-2">'. $booking->unit_no .' </span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="applicant_name"><strong>Applicant Name</strong> </p></div>
              <div class="col-8"> <span class="text-right font-medium-3 mx-2"><strong>'. $booking->applicant_name .' </strong></span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="cnic"><strong>CNIC</strong> </p></div>
              <div class="col-8"> <span class="text-right font-medium-2 mx-2">'. $booking->cnic .' </span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="phone_no"><strong>Phone Number</strong> </p></div>
              <div class="col-8"> <span class="text-right font-medium-2 mx-2">'. $booking->phone_no .' </span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="booking_amount"><strong>Booking Amount</strong> </p></div>
              <div class="col-8"> <strong><span class="text-right success font-medium-3 mx-2">Rs. '. number_format($booking->booking_amount) .' </strong></span></div>
            </div>
            <div class="row">
              <div class="col-4"><p for="remaining_amount"><strong>Remaining Amount</strong> </p></div>
              <div class="col-8"> <strong><span class="text-right danger font-medium-3 mx-2">Rs. '. number_format($booking->remaining_amount) .' </strong></span></div>
            </div>
            <div class="row">
              <div class="col-4">
              <p for="status"><strong>Status </strong>';
            $output .='</p>
              </div>
              <div class="col-8"> <span class="text-right font-medium-3 mx-2">';
            if($booking->status == "Booked") { 
            $output .= '<div class="chip chip-primary mr-1">
                    <div class="chip-body">
                        <span class="chip-text">'. $booking->status .'</span>
                    </div>
                </div>';
            }
            else {
            $output .= '<div class="chip chip-success mr-1">
                    <div class="chip-body">
                        <span class="chip-text">'. $booking->status .'</span>
                    </div>
                </div>';    
            } 
            $output .=' </span></div>
                </div>
            <div class="row">
              <div class="col-4"><p for="phone_no"><strong>Created At</strong> </p></div>
              <div class="col-8"> <span class="text-right font-medium-2 mx-2">'. $booking->created_at .' </span></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>';
        
        echo $output;

    }

    public function unit_book(Request $request){

      //directly book from map

      $unitNo = $request->get('unitNo');
      $blockID = $request->get('blockID');
      $block_data = Block::where('id',$blockID)->first();

      $check_status = Booking::where('block_id','=',$blockID)->where('unit_no','=',$unitNo)->count();

        if($check_status == 1){
          //record exist in booking table
          $get_data = Booking::where('block_id','=',$blockID)->where('unit_no','=',$unitNo)->first();

          if($get_data->status == 'Available'){

            $output = '';
            $output .= '<form action = "AddBooking/'.$get_data->id.'" method = "post">';
            $output .= '<input type = "hidden" name = "_token" value = "'.csrf_token().'">';
            $output .= '<h4>Booking Area</h4>';
            $output .= '<div class="col-md-4">';
            $output .= '<label for="booking_date"><strong>Booking Date</strong></label>
                          <input id="booking_date" class="form-control" type="date" name="booking_date" required>';
            $output .= '</div>';
            
            $output .= '<div class="col-md-4">';
            $output .= '<label for="block_id"><strong>Unit No</strong></label>
                          <input id="block_id" class="form-control" type="hidden" value="'.$get_data->block_id.'" name="block_id" >
                          <input id="block_name" class="form-control" type="text" value="'.$get_data->block->name.' '.$unitNo.'" name="block_name" readonly>';
            $output .= '</div>';

            $output .= '<div class="col-md-4">';
            $output .= '<label for="plot_size"><strong>Size</strong></label>
                          <select class="form-control" name="plot_size">';

            $output .= '<option value="200">200</option>';
            $output .= '<option value="500">500</option>';

            $output .= '</select>';
            $output .= '</div>';


            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="applicant_name"><strong>Applicant Name</strong></label>
                        <input id="applicant_name" placeholder="Enter Applicant Name" class="form-control" type="text" name="applicant_name" required>';
            $output .= '</div>';

            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="cnic"><strong>Applicant CNIC</strong></label>
                        <input id="cnic" placeholder="Enter CNIC" class="form-control" type="text" name="cnic">';
            $output .= '</div>';
            

            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="phone_no"><strong>Applicant Phone</strong></label>
                        <input id="phone_no" placeholder="Enter Phone" class="form-control" type="text" name="phone_no">';
            $output .= '</div>';


            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="email_add"><strong>Email Address</strong></label>
                        <input id="email_add" placeholder="Enter Email Address" class="form-control" type="text" name="email_add">';
            $output .= '</div>';

            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="booking_amount"><strong>Agreed Amount</strong></label>
                        <input id="booking_amount" placeholder="Enter Agreed Amount" class="form-control" type="text" name="booking_amount">';
            $output .= '</div>';

            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="discount"><strong>Discount Amount</strong></label>
                        <input id="discount" placeholder="Enter Discount Amount" class="form-control" type="text" name="discount">';
            $output .= '</div>';

            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="token"><strong>Token</strong></label>
                        <input id="token" placeholder="Enter Token Amount" class="form-control" type="text" name="token">';
            $output .= '</div>';


            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="status"><strong>Status</strong></label>
                          <select class="form-control" name="status">';

            $output .= '<option value="Booked">Booked</option>';
            $output .= '<option value="Hold">Hold</option>';

            $output .= '</select>';
            $output .= '</div>';

            $output .= '<div class="col-md-8" style="padding-top: 10px; ">';
            $output .= '<label for="notes"><strong>Notes</strong></label>
                        <textarea class="form-control" name="notes" id="notes"></textarea>';
            $output .= '</div>';


            $output .= '<hr>';

            $output .= '<h4>Receipt Area</h4>';

            $output .= '<div class="col-md-6"  style="padding-top: 10px;">';
            $output .= '<label for="payment_mode"><strong>Mode of Payments</strong></label>
                          <select class="form-control" name="payment_mode">';

            $output .= '<option value="Installment">Installment</option>';
            $output .= '<option value="Cash">Cash</option>';

            $output .= '</select>';
            $output .= '</div>';

            $output .= '<div class="col-md-6"  style="padding-top: 10px; padding-bottom: 15px;">';
            $output .= '<label for="receipt_file"><strong>Upload Receipt</strong></label>
                        <input id="receipt_file" class="form-control" type="file" name="file">';
            $output .= '</div>';

            $output .= '<div class="modal-footer" style="padding-top: 10px;">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>';

            $output .= '</form>';

            echo $output;

          }elseif ($get_data->status == 'Booked') {
            # code...
          }elseif ($get_data->status == 'Hold') {
            # code...
          }elseif ($get_data->status == 'ForSale') {
            # code...
          }



        }else{
          //new record

          $output = '';
            $output .= '<form action = "NewBooking" method = "post">';
            $output .= '<input type = "hidden" name = "_token" value = "'.csrf_token().'">';
            $output .= '<h4>Booking Area</h4>';
            $output .= '<div class="col-md-4">';
            $output .= '<label for="booking_date"><strong>Booking Date</strong></label>
                          <input id="booking_date" class="form-control" type="date" name="booking_date" required>';
            $output .= '</div>';
            
            $output .= '<div class="col-md-4">';
            $output .= '<label for="block_id"><strong>Unit No</strong></label>
                          <input id="block_id" class="form-control" type="hidden" value="'.$block_data->id.'" name="block_id" >
                          <input id="block_name" class="form-control" type="text" value="'.$block_data->name.' '.$unitNo.'" name="block_name" readonly>';
            $output .= '</div>';

            $output .= '<div class="col-md-4">';
            $output .= '<label for="plot_size"><strong>Size</strong></label>
                          <select class="form-control" name="plot_size">';

            $output .= '<option value="200">200</option>';
            $output .= '<option value="500">500</option>';

            $output .= '</select>';
            $output .= '</div>';


            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="applicant_name"><strong>Applicant Name</strong></label>
                        <input id="applicant_name" placeholder="Enter Applicant Name" class="form-control" type="text" name="applicant_name" required>';
            $output .= '</div>';

            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="cnic"><strong>Applicant CNIC</strong></label>
                        <input id="cnic" placeholder="Enter CNIC" class="form-control" type="text" name="cnic">';
            $output .= '</div>';
            

            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="phone_no"><strong>Applicant Phone</strong></label>
                        <input id="phone_no" placeholder="Enter Phone" class="form-control" type="text" name="phone_no">';
            $output .= '</div>';


            $output .= '<div class="col-md-6" style="padding-top: 10px;">';
            $output .= '<label for="email_add"><strong>Email Address</strong></label>
                        <input id="email_add" placeholder="Enter Email Address" class="form-control" type="text" name="email_add">';
            $output .= '</div>';

            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="booking_amount"><strong>Agreed Amount</strong></label>
                        <input id="booking_amount" placeholder="Enter Agreed Amount" class="form-control" type="text" name="booking_amount">';
            $output .= '</div>';

            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="discount"><strong>Discount Amount</strong></label>
                        <input id="discount" placeholder="Enter Discount Amount" class="form-control" type="text" name="discount">';
            $output .= '</div>';

            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="token"><strong>Token</strong></label>
                        <input id="token" placeholder="Enter Token Amount" class="form-control" type="text" name="token">';
            $output .= '</div>';


            $output .= '<div class="col-md-4" style="padding-top: 10px;">';
            $output .= '<label for="status"><strong>Status</strong></label>
                          <select class="form-control" name="status">';

            $output .= '<option value="Booked">Booked</option>';
            $output .= '<option value="Hold">Hold</option>';

            $output .= '</select>';
            $output .= '</div>';

            $output .= '<div class="col-md-8" style="padding-top: 10px; ">';
            $output .= '<label for="notes"><strong>Notes</strong></label>
                        <textarea class="form-control" name="notes" id="notes"></textarea>';
            $output .= '</div>';


            $output .= '<hr>';

            $output .= '<h4>Receipt Area</h4>';

            $output .= '<div class="col-md-6"  style="padding-top: 10px;">';
            $output .= '<label for="payment_mode"><strong>Mode of Payments</strong></label>
                          <select class="form-control" name="payment_mode">';

            $output .= '<option value="Installment">Installment</option>';
            $output .= '<option value="Cash">Cash</option>';

            $output .= '</select>';
            $output .= '</div>';

            $output .= '<div class="col-md-6"  style="padding-top: 10px; padding-bottom: 15px;">';
            $output .= '<label for="receipt_file"><strong>Upload Receipt</strong></label>
                        <input id="receipt_file" class="form-control" type="file" name="file">';
            $output .= '</div>';

            $output .= '<div class="modal-footer" style="padding-top: 10px;">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>';

            $output .= '</form>';

            echo $output;

        }

      // try{

      //   $check_status = Booking::where('block_id','=',$blockID)->where('unit_no','=',$unitNo)->first();

      //   if($check_status->count() == 1){
      //     //record exist in booking table

      //     if($check_status->status == 'Available'){







      //       $output = '';
      //       $output .= '<form action = "AddBooking/'.$check_status->id.'" method = "post">';
      //       $output .= '<input type = "hidden" name = "_token" value = "'.csrf_token().'">';

      //       $output .= '<label for="booking_date"><strong>Booking Date</strong></label>
      //                     <input id="booking_date" class="form-control" type="date" name="booking_date" required>';

      //       $output .= '<label for="block_id"><strong>Block</strong></label>
      //                     <input id="block_id" class="form-control" type="hidden" value="'.$check_status->block_id.'" name="block_id" >
      //                     <input id="block_name" class="form-control" type="text" value="'.$check_status->block->name.'" name="block_name" readonly>';

      //       $output .= '<label for="plot_size"><strong>Size</strong></label>
      //                     <select class="form-control" name="plot_size">';

      //       $output .= '<option value="200">200</option>';
      //       $output .= '<option value="500">500</option>';

      //       $output .= '</select>';


      //       $output .= '<label for="unit_no"><strong>Unit-No</strong></label>
      //                   <input id="unit_no" class="form-control" type="text" value="'.$unitNo.'" name="unit_no" >';

      //       $output .= '<label for="applicant_name"><strong>Applicant Name</strong></label>
      //                   <input id="applicant_name" placeholder="Enter Applicant Name" class="form-control" type="text" name="applicant_name" required>';

      //       $output .= '<label for="cnic"><strong>Applicant Name</strong></label>
      //                   <input id="cnic" placeholder="Enter CNIC" class="form-control" type="text" name="cnic">';

      //       $output .= '<label for="phone_no"><strong>Applicant Phone</strong></label>
      //                   <input id="phone_no" placeholder="Enter Phone" class="form-control" type="text" name="phone_no">';

      //       $output .= '<label for="email_add"><strong>Email Address</strong></label>
      //                   <input id="email_add" placeholder="Enter Email Address" class="form-control" type="text" name="email_add">';

      //       $output .= '<label for="booking_amount"><strong>Booking Amount</strong></label>
      //                   <input id="booking_amount" placeholder="Enter Booking Amount" class="form-control" type="text" name="booking_amount">';

      //       $output .= '<label for="booking_amount"><strong>Booking Amount</strong></label>
      //                   <input id="booking_amount" placeholder="Enter Booking Amount" class="form-control" type="text" name="booking_amount">';

      //       $output .= '<label for="discount"><strong>Discount</strong></label>
      //                   <input id="discount" placeholder="Enter Discount Amount" class="form-control" type="text" name="discount">';

      //       $output .= '<div class="modal-footer">
      //                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      //                     <button type="submit" class="btn btn-primary">Add Booking</button>
      //                   </div>';

      //       $output .= '</form>';

      //       echo $output;

      //     }elseif ($check_status->status == 'Booked') {
      //       # code...
      //     }elseif ($check_status->status == 'Hold') {
      //       # code...
      //     }elseif ($check_status->status == 'ForSale') {
      //       # code...
      //     }



      //   }else{
      //     //new record

      //   }

      // }catch (\Exception $e) {
      //      Toastr::error('Operation Failed', 'Failed');
      //      //return redirect()->back(); 
      //   }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents = Agent::get();
        $blocks = Block::get();
        $booking = Booking::find($id);
        return view('admin.booking.edit',compact('booking','agents','blocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = Booking::find($id);

        $new->booking_date = $request->booking_date;
        $new->agent_id = $request->agent_id;
        $new->block_id = $request->block_id;
        $new->plot_size = $request->plot_size;
        $new->unit_no = $request->unit_no;
        $new->applicant_name = $request->applicant_name;
        $new->cnic = $request->cnic;
        $new->phone_no = $request->phone_no;
        $new->booking_amount = $request->booking_amount;
        $new->remaining_amount = $request->remaining_amount;
        $new->status = $request->status;

        $new->update();

        return redirect()->route('dashboard.index')->with('success','Booking has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = Booking::find($id);
        $new->status = "Unbooked";
        $new->update();
        return redirect()->route('dashboard.index')->with('danger','Booking has been cancelled successfully!');
    }
}
