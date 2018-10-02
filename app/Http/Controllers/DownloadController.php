<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Resource;
use App\Article;
use App\Exercise;
use App\Question;
use App\Vocabulary;
use App\Warm_up;
use App\Media;
use App\Script;
use App\Phrase;
use App\Homework;
use App\Rating;
use PDF;

class DownloadController extends Controller
{
 
    public function downloadPDF($id)
    {

    	$resource = Resource::findOrFail($id);
        $resources = Resource::where('id',$id)->get();
        $articles = Article::where('resource_id', $id)->get();
        $warm_ups = Warm_up::where('resource_id', $id)->get();
        $questions = Question::where('resource_id', $id)->get();
        $exercises = Exercise::where('resource_id', $id)->get();
        $vocabularies = Vocabulary::where('resource_id', $id)->get();
        $medias = Media::where('resource_id', $id)->get();
        $scripts = Script::where('resource_id', $id)->get();
        $phrases = Phrase::where('resource_id', $id)->get();

      $pdf = PDF::loadView('pdf', ['resources'=>$resources, 'articles' => $articles, 'warm_ups'=>$warm_ups, 'phrases'=>$phrases, 'questions'=>$questions, 'exercises'=>$exercises, 'vocabularies'=>$vocabularies, 'medias'=>$medias, 'scripts'=>$scripts,]);

      return $pdf->download(  $resource->title . '.pdf');
    	

    }

}
