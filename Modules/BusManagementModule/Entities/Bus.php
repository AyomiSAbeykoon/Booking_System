<?php

namespace Modules\BusManagementModule\Entities;

use Illuminate\Database\Eloquent\Model;

class bus extends Model
{
    protected $fillable = ['id','name','type','vehicle_number'];

    /*make relationships */
    public function bus_routes()
    {
        return $this->hasMany('Modules\RouteManagementModule\Entities\bus_routes');
    }
    public function BusSeat()
    {
        return $this->hasMany('Modules\BusManagementModule\Entities\BusSeat');
    }
}
