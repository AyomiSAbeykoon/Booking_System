<?php

namespace Modules\BusManagementModule\Entities;

use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    protected $fillable = ['id','bus_id','seat_number','price'];

    /*make relationships */
    public function bus()
    {
        return $this->belongsTo('Modules\BusManagementModule\Entities\bus');
    }
    public function bus_schedule_bookings()
    {
        return $this->hasMany('Modules\AppointmentManagementModule\Entities\bus_schedule_bookings');
    }
}
