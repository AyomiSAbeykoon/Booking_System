<?php

namespace Modules\AppointmentManagementModule\Entities;

use Illuminate\Database\Eloquent\Model;

class BusSchedule extends Model
{
    protected $fillable = ['id','bus_route_id','direction','start_timestamp','end_timestamp'];

    /*make relationships */
    public function BusScheduleBooking()
    {
        return $this->hasMany('Modules\AppointmentManagementModule\Entities\BusScheduleBooking');
    }
    public function BusRoute()
    {
        return $this->belongsTo('Modules\RouteManagementModule\Entities\BusRoute');
    }
}

