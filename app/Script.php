<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Script extends Model
{

    protected $fillable = [
        'resource_id', 'speaker', 'content', 'img_path', 'audio_path', 'media_path',
    ];


    public function script()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
