<?php

namespace Modules\AppointmentManagementModule\Entities;

use Illuminate\Database\Eloquent\Model;

class BusScheduleBooking extends Model
{
    protected $fillable = ['id','bus_seate_id','user_id','bus_schedule_id','seat_number','price','status'];

    /*make relationships */
    public function user()
    {
        return $this->belongsTo('App\user');
    }
    public function BusSchedule()
    {
        return $this->belongsTo('Modules\AppointmentManagementModule\Entities\BusSchedule');
    }
    public function BusSeat()
    {
        return $this->belongsTo('Modules\BusManagementModule\Entities\BusSeat');
    }
}
