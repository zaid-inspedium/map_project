<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Agent;
use App\Models\Block;
use Illuminate\Http\Request;
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
