<?php

namespace Modules\AppointmentManagementModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AppointmentManagementModule\Entities\BusScheduleBooking;
use Modules\AppointmentManagementModule\Transformers\ScheduleResource;

class BusScheduleBookingController extends Controller
{
    //view schedule bookings by admin
    public function index()
    {
        //get data from database
        $Booking= BusScheduleBooking::all();

        //view data
        return new ScheduleResource($Booking);
    }

    //make booking
    public function store(Request $request)
    {
        $BusScheduleBooking=new BusScheduleBooking();

        $BusScheduleBooking->bus_seate_id=$request->input('bus_seate_id');
        $BusScheduleBooking->user_id=$request->input('user_id');
        $BusScheduleBooking->bus_schedule_id=$request->input('bus_schedule_id');
        $BusScheduleBooking->seat_number=$request->input('seat_number');
        $BusScheduleBooking->price=$request->input('price');
        
        $BusScheduleBooking->save(); 
    }

    //Show my bookings by user
    public function show($id)
    {
        $Booking= BusScheduleBooking::findOrFail($id);
        
        return new ScheduleResource($Booking);
    
    }

    //cancel the booking
    public function update(Request $request, $id)
    {
        $BusScheduleBooking= BusScheduleBooking::findOrFail($id);
        
           
        $BusScheduleBooking->status=$request->input('status');

        $BusScheduleBooking->save();
            
        

        
       
    }

}
