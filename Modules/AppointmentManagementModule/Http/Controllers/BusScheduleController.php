<?php

namespace Modules\AppointmentManagementModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AppointmentManagementModule\Entities\BusSchedule;
use Modules\AppointmentManagementModule\Transformers\ScheduleResource;

class BusScheduleController extends Controller
{
    //view Bus Schedule
    public function index()
    {
        //get data from database
        $BusSchedule= BusSchedule::all();

        //view data
        return new ScheduleResource($BusSchedule);
    }

    //create bus schedules
    public function store(Request $request)
    {
        $BusSchedule=new BusSchedule();

        $BusSchedule->bus_route_id=$request->input('bus_route_id');
        $BusSchedule->direction=$request->input('direction');
        $BusSchedule->start_timestamp=$request->input('start_timestamp');
        $BusSchedule->end_timestamp=$request->input('end_timestamp');

        $BusSchedule->save(); 

    }

    //update Bus Schedule
    public function update(Request $request, $id)
    {
        $BusSchedule= BusSchedule::findOrFail($id);

        $BusSchedule->bus_route_id=$request->input('bus_route_id');
        $BusSchedule->direction=$request->input('direction');
        $BusSchedule->start_timestamp=$request->input('start_timestamp');
        $BusSchedule->end_timestamp=$request->input('end_timestamp');

        $BusSchedule->save();
    
    }

    //delete the requested Bus Schedule
    public function destroy($id)
    {
        $BusSchedule= BusSchedule::findOrFail($id);
        $BusSchedule->delete();
      
    }
}
