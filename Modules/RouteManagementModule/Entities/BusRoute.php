<?php

namespace Modules\RouteManagementModule\Entities;

use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    protected $fillable = ['id','bus_id','route_id','status'];

    /*make relationships */
    public function Route()
    {
        return $this->belongsTo('Modules\RouteManagementModule\Entities\Route');
    }
    public function Bus()
    {
        return $this->belongsTo('Modules\BusManagementModule\Entities\Bus');
    }
    public function BusSchedule()
    {
        return $this->hasMany('Modules\AppointmentManagementModule\Entities\BusSchedule');
    }
}
