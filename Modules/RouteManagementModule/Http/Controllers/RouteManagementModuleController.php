<?php

namespace Modules\RouteManagementModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RouteManagementModule\Entities\Route;
use Modules\RouteManagementModule\Transformers\RouteResource;

class RouteManagementModuleController extends Controller
{
    //dispaly the Route deatils
    public function index()
    {
        //get data from database
        $route= Route::all();

        //view data
        return new RouteResource( $route);
    }

    //store routes deatils to routes table
    public function store(Request $request)
    {
        $route=new Route();
        $route->node_one=$request->input('node_one');
        $route->node_two=$request->input('node_two');
        $route->route_number=$request->input('route_number');
        $route->distance=$request->input('distance');
        $route->time=$request->input('time');

        $route->save();

    }

    /**
     * Update Route table
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $route= Route::findOrFail($id);

        $route->node_one=$request->input('node_one');
        $route->node_two=$request->input('node_two');
        $route->route_number=$request->input('route_number');
        $route->distance=$request->input('distance');
        $route->time=$request->input('time');

        $route->save();
    }

    /**
     * Delete requsted route
     * @param int $id
     */
    public function destroy($id)
    {
        $route= Route::findOrFail($id);
        $route->delete();
    }
}
