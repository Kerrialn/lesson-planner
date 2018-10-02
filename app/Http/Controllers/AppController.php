<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\Article;
use App\Exercise;
use App\Question;
use App\Vocabulary;
use App\Warm_up;
use App\Media;
use App\Script;
use App\Phrase;
use App\Rating;
use Auth;

class AppController extends Controller
{


    public function index()
    {
        $titles = Resource::pluck('title');
        $results = Resource::take(10)->orderBy('created_at', 'DESC')->get();
        return view('welcome', ['titles'=>$titles, 'results'=>$results,]);
    }
    
    
    public function about()
    {
        return view('about');
    }        


    public function front_search(Request $request)
    {
 
        $title = $request->input('search');
        $results = Resource::where('title', 'LIKE', '%' .  $title . '%')->get();
        $output="";
          $vocb="";
          $phrs="";
          $warm="";
          $ar="";
          $que="";
          $scri="";
          $hw="";
          $ws="";
          $geo_image="";
         $input_array= [];
         
        foreach ($results as $result) {
 
        if($result->has_vocabulary){
            $vocb = '<div class="chip ">Vocabulary</div>';
        }
        
          if($result->has_phrases){
            $phrs = '<div class="chip ">Phrases</div>';
            }

          if($result->has_warmups){
          $warm = '<div class="chip ">Warm ups</div>';
          }

          if($result->has_article){
          $ar = '<div class="chip ">Article</div>';
          }

          if($result->has_questions){
          $que = '<div class="chip ">Questions</div>';
          }

          if($result->has_media){
          $med = '<div class="chip ">Media</div>';
          }

          if($result->has_script){
          $scri = '<div class="chip ">Script</div>';
          }
          
          if($result->has_wordsearch){
          $ws = '<div class="chip ">Word search</div>';
          }

          if($result->has_homework){
          $hw = '<div class="chip ">Homework</div>';
          }
 
 $input_array = array("gp-1.png", "gp-2.png", "gp-3.png", "gp-4.png", "gp-5.png", "gp-6.png");
 $geo_image = $input_array[rand(0,sizeof($input_array)-1)];
 
     $output .= '<div class="col m6 s12">'.
    '<a class="nolink" href=" ' . route('resource.item', [$result->level, $result->id]) . '">'.
      '<div class="card">'.
        '<div class="card-image">'.
            '<img src="imgs/'. $geo_image .'"/>'.
            '<span class="card-title">'.
                '<h5 class="">'. $result->title .'</h5>'.
                '<small><i>' . $result->level . '</i></small>'.
            '</span>'.
        '</div>'.
        '<div class="card-content">'.
          '<p>'.
          
          $vocb.
          $phrs.
          $warm.
          $ar.
          $que.
          $scri.
          $hw.
          $ws.
          
        '</p>'.
        '</div>'.
        '<div class="card-action">'.
            '<div class="row m-0">'.
                '<div class="col m6">'.
                    '<span><i class="tiny material-icons">star</i>' . number_format($result->avgRating(), 2) .'</span>'.
                '</div>'.
                '<div class="col m6 right-align">'.
                    '<span>'. $result->created_at->diffForHumans() .'</span>'.
                '</div>'.
            '</div>'.
        '</div>'.
      '</div>'.
   '</a>'.
   '</div>';
         
        }   

    return Response($output);
    }












    public function getLevel($level)
    {

        $resources = Resource::where('level', '=', $level)->paginate(15);
        return view('resource',  ['resources'=>$resources]);
    }


    public function getItem($level, $id)
    {
        $resources = Resource::where('level',$level)->where('id',$id)->get();
        $articles = Article::where('resource_id', $id)->get();
        $warm_ups = Warm_up::where('resource_id', $id)->get();
        $questions = Question::where('resource_id', $id)->get();
        $exercises = Exercise::where('resource_id', $id)->get();
        $vocabularies = Vocabulary::where('resource_id', $id)->get();
        $medias = Media::where('resource_id', $id)->get();
        $scripts = Script::where('resource_id', $id)->get();
        $phrases = Phrase::where('resource_id', $id)->get();

        if (Auth::user()){
        $user_rating = Rating::where([ ['resource_id', $id],['user_id', Auth::user()->id] ])->first(); 
        }else{
        $user_rating = Rating::all();   
        }

        return view('item',  ['resources'=>$resources, 'articles' => $articles, 'warm_ups'=>$warm_ups, 'phrases'=>$phrases, 'questions'=>$questions, 'exercises'=>$exercises, 'vocabularies'=>$vocabularies, 'medias'=>$medias, 'scripts'=>$scripts, 'user_rating'=>$user_rating]);
    }


public function getDownload($filename)
{
return response()->file('download/'.$filename);
}



}
