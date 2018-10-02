<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Homework extends Model
{
    protected $fillable = [
        'resource_id', 'content',
    ];

	
    public function homework()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
