<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Agent;
use App\Models\Block;
use Illuminate\Http\Request;

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

        $data = Booking::select('bookings.id',
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
                        ->where('bookings.status','Booked')
                        ->get();

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
            <label for="booking_date"><strong>Booking Date</strong> '. $booking->booking_date .' </label>
            <br><label for="agent_id"><strong>Agent </strong> '. $booking->agent_name .' </label>
            <br><br><label for="block_id"><strong>Block</strong> '. $booking->block_name .' </label>
            <br><br><label for="plot_size"><strong>Plot Size</strong> '. $booking->plot_size .' </label>
            <br><br><label for="unit_no"><strong>Unit-No</strong> '. $booking->plot_size .' </label>
            <br><br><label for="applicant_name"><strong>Applicant Name</strong> '. $booking->applicant_name .' </label>
            <br><br><label for="cnic"><strong>CNIC</strong> '. $booking->cnic .' </label>
            <br><br><label for="phone_no"><strong>Phone Number</strong> '. $booking->phone_no .' </label>
            <br><br><label for="booking_amount"><strong>Booking Amount</strong> '. number_format($booking->booking_amount) .' </label>
            <br><br><label for="remaining_amount"><strong>Remaining Amount</strong> '. number_format($booking->remaining_amount) .' </label>
            <br><br><label for="status"><strong>Status </strong>';
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
            $output .='</label>
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
