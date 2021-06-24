<?php

namespace Modules\BusManagementModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BusManagementModule\Entities\Bus;
use Modules\BusManagementModule\Transformers\BusManagementResource;


class BusManagementController extends Controller
{
    //dispaly the bus deatils
    public function index()
    {
        //get data from database
        $bus= Bus::all();

        //view data
        return new BusManagementResource($bus);

    }

     //Store Bus details to Bus table
    public function store(Request $request)
    {        
        $bus=new bus();

        $bus->name=$request->input('name');
        $bus->type=$request->input('type');
        $bus->vehical_number=$request->input('vehical_number');

        $bus->save(); 
    }

    //update bus table
    public function update(Request $request, $id)
    {
        $bus= Bus::findOrFail($id);

        $bus->name=$request->input('name');
        $bus->type=$request->input('type');
        $bus->vehical_number=$request->input('vehical_number');

        $bus->save();
     
    }

   //Delete requested bus
    public function destroy($id)
    {
        $bus= Bus::findOrFail($id);
        $bus->delete();
        
    }
}
