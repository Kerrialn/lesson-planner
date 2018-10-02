<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class Vocabulary extends Model
{

    protected $fillable = [
        'resource_id', 'word', 'definition', 'phonetic_spelling', 'audio',
    ];

    public function vocabulary()
    {
        return $this->belongsTo('App\Resource', 'id', 'resource_id');
    }
}
