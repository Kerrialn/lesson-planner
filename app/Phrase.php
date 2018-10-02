<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Phrase extends Model
{
    protected $fillable = [
        'resource_id', 'phrase', 'definition', 'audio',
    ];

    public function phrase()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
