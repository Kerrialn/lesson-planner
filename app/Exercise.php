<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Exercise extends Model
{
    public function exercise()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
