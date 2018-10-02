<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Media extends Model
{

    protected $fillable = [
        'resource_id', 'caption', 'media_path', 'media_path_fb', 'image_path',
    ];

    public function media()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
