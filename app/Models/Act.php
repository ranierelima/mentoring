<?php

namespace Mentor\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Act extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['area', 'demand_id', 'type'];

        public function demand()
    {
        return $this->hasOne(Demand::class, 'demand_id');
    }

}
