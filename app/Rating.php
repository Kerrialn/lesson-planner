<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rating;

class Rating extends Model
{

	protected $fillable = ['user_id', 'resource_id', 'rating',];

    public function rating()
    {
        return $this->belongsTo('App\Resource', 'resource_id', 'id');
    }


}
