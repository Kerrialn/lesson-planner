<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Question extends Model
{

    protected $fillable = [
        'resource_id', 'question',
    ];



    public function question()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
