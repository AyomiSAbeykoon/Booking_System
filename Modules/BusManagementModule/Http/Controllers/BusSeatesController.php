<?php

namespace Modules\BusManagementModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BusManagementModule\Entities\BusSeat;
use Modules\BusManagementModule\Transformers\BusManagementResource;


class BusSeatesController extends Controller
{
    //dispaly the bus deatils
    public function index()
    {
        //get data from database
        $busSeates= BusSeat::all();

        //view data
        return new BusManagementResource($busSeates);
 
    }

    //Store Bus seat details to Bus_seates table
    public function store(Request $request)
    { 
        $busSeates=new BusSeat();

        $busSeates->bus_id=$request->input('bus_id');
        $busSeates->seat_number=$request->input('seat_number');
        $busSeates->price=$request->input('price');

        $busSeates->save();  
    }

    ///update bus seat table
    public function update(Request $request, $id)
    {
        $busSeates= BusSeat::findOrFail($id);

        $busSeates->bus_id=$request->input('bus_id');
        $busSeates->seat_number=$request->input('seat_number');
        $busSeates->price=$request->input('price');

        $busSeates->save();
        
    }

    //Delete requested Bus seat
    public function destroy($id)
    {
        $busSeates= BusSeat::findOrFail($id);
        $busSeates->delete();
        
    }
}
