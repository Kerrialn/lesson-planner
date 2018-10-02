<?php

namespace App;
use App\Article;
use App\Exercise;
use App\Vocabulary;
use App\Warm_up;
use App\Media;
use App\Script;
use App\Phrase;
use App\Homework;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    protected $fillable = [
        'user_id', 'title', 'level', 'skill', 'category', 'has_phrases', 'has_homework', 'has_warmups', 'has_exercises', 'has_article', 'has_vocabulary', 'has_questions', 'has_media', 'has_script', 'has_wordsearch', 'is_public', 'download', 'created_at', 'updated_at',  
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
	
    public function articles()
    {
        return $this->hasMany('App\Article', 'resource_id', 'id');
    }

    public function exercises()
    {
        return $this->hasMany('App\Exercise', 'resource_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany('App\Question', 'resource_id', 'id');
    }    

    public function vocabularies()
    {
        return $this->hasMany('App\Vocabulary', 'resource_id', 'id');
    }

    public function warm_ups()
    {
        return $this->hasMany('App\Warm_up', 'resource_id', 'id');
    }

    public function medias()
    {
        return $this->hasMany('App\Media', 'resource_id', 'id');
    }

    public function scripts()
    {
        return $this->hasMany('App\Script', 'resource_id', 'id');
    }
    public function phrases()
    {
        return $this->hasMany('App\Phrase', 'resource_id', 'id');
    }    
    public function homeworks()
    {
        return $this->hasMany('App\Homework', 'resource_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'resource_id', 'id');
    }

    public function avgRating()
    {
         return $this->ratings()->avg('rating');
    }

}
