<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Warm_up extends Model
{

    protected $fillable = [
        'resource_id', 'content', 'img_path',
    ];

    public function warm_up()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
