<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Article extends Model
{

    protected $fillable = [
        'resource_id', 'article', 'audio',
    ];


    public function article()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
