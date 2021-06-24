<?php

namespace Modules\RouteManagementModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['id','node_one','node_two','route_number','disatance','time'];

    /*make relationships */
    public function BusRoute()
    {
        return $this->hasMany('Modules\RouteManagementModule\Entities\BusRoute');
    }
}
