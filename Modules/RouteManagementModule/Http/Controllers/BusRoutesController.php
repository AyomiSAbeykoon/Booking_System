<?php

namespace Modules\RouteManagementModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RouteManagementModule\Entities\BusRoute;
use Modules\RouteManagementModule\Transformers\RouteResource;

class BusRoutesController extends Controller
{
   //dispaly the bus_routes deatils
    public function index()
    {
        //get data from database
        $busRoutes = BusRoute::all();

        //view data
        return new RouteResource($busRoutes);
    }

    //Store bus toutes details to bus_routes table
    public function store(Request $request)
    {
        $bus_routes=new BusRoute();

        $bus_routes->bus_id=$request->input('bus_id');
        $bus_routes->route_id=$request->input('route_id');
        $bus_routes->status=$request->input('status');
    
        $bus_routes->save();
    }

    //Update bus route table
    public function update(Request $request, $id)
    {
        $bus_routes= BusRoute::findOrFail($id);

        $bus_routes->bus_id=$request->input('bus_id');
        $bus_routes->route_id=$request->input('route_id');
        $bus_routes->status=$request->input('status');

        $bus_routes->save();
        
    }

    //Delete requested bus route
    public function destroy($id)
    {
        $bus_routes= BusRoute::findOrFail($id);
        $bus_routes->delete();
  
    }
}
