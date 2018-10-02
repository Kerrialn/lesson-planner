<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $resources = Resource::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('home', ['resources'=>$resources]);
    }
       

       public function rate_resource(Request $request, $id)
    {
        $this->validate($request, [
            'user_id'=>'required',
            'resource_id'=>'required',
            'rating'=>'required|numeric|min:0|max:5',

        ]);

        Rating::create($request->all());
        return redirect()->back()->with('message', 'Resource rated');
    }
   


    public function getUserAccount()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('account', ['user'=>$user]);
    }
   
    public function updateUserAccount(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->update( $request->all() );  

       return redirect()->back()->with('message', 'Account updated');
    }


    public function getCreatePage()
    {
        return view('resource.create');
    }
    

    public function getResource($id)
    {

        $resource = Resource::findOrFail($id);
        $articles = Article::where('resource_id', $id)->get();
        $warm_ups = Warm_up::where('resource_id', $id)->get();
        $questions = Question::where('resource_id', $id)->get();
        $exercises = Exercise::where('resource_id', $id)->get();
        $vocabularies = Vocabulary::where('resource_id', $id)->get();
        $medias = Media::where('resource_id', $id)->get();
        $scripts = Script::where('resource_id', $id)->get();
        $phrases = Phrase::where('resource_id', $id)->get();
        $homeworks = Homework::where('resource_id', $id)->get();

        return  view('resource.view', ['resource'=>$resource, 'articles' => $articles, 'warm_ups'=>$warm_ups, 'phrases'=>$phrases, 'questions'=>$questions, 'exercises'=>$exercises, 'vocabularies'=>$vocabularies, 'medias'=>$medias, 'scripts'=>$scripts, 'homeworks'=>$homeworks,]);
    }

    public function save_new_resource(Request $request)
    {     
        $this->validate($request, [
            'title'=>'required|max:60',
            'level'=>'required',
            'skill'=>'required',
            'category'=>'required',

        ]);

    $resource = Resource::create($request->all());

    return redirect()->route('home')->with('message', 'Resource created');
    }


    public function update_resource(Request $request, $id)
    {     
        
        $resource = Resource::findOrFail($id);
        $resource->update( $request->all() );  
        
        return redirect()->route('view.resource', $id)->with('message', 'Resource updated');;
    }


    public function destroy_resource($id)
    {     
        $resource = Resource::findOrFail($id);
        $resource->delete();
        return redirect()->route('home')->with('message', 'Resource deleted');
    }


    public function create_warmup(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'content'=>'required',
        ]);

        $resource = Warm_up::create($request->all());
        return redirect()->route('view.resource', $id)->with('message', 'Warm up updated');
    }

     public function destroy_warmup($id)
    {     
        $warm_up = Warm_up::findOrFail($id);
        $warm_up->delete();
        return redirect()->back()->with('message', 'Warm up deleted');

    }   




    public function create_phrase(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'phrase'=>'required',
            'definition'=>'required',
        ]);

        $input = $request->all();
        if($file = $request->file('audio')){
            $name = $file->getClientOriginalName();
            $location = "audio/vocab";
            $file->move($location , $name);
            $input['audio'] = $name;
        }
        
        Phrase::create($request->all());
        return redirect()->route('view.resource', $id)->with('message', 'Phrase updated');

    }

     public function destroy_phrase($id)
    {     
        $phrase = Phrase::findOrFail($id);
        $phrase->delete();
        return redirect()->back()->with('message', 'Phrase deleted');

    }   



    public function create_media(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'media_path' => 'required_without_all:image_path,media_path_fb',
            'image_path' => 'required_without_all:media_path,media_path_fb',
            'media_path_fb' => 'required_without_all:image_path,media_path',
        ]);

        $input = $request->all();
        if( $request->input('media_path') ){
        $urlParts = explode('/', $input['media_path']);
        $vidid = explode( '&', str_replace('watch?v=', '', end($urlParts) ) );
        $input['media_path'] = $vidid[0];  
        }
        
        if( $request->input('media_path_fb') ){
        $fb_iframe = $request->input('media_path_fb');
        preg_match('/src="([^"]+)"/', $fb_iframe, $fblink);
        $input['media_path_fb'] = $fblink[1];        
        }
        
        if($file = $request->file('image_path')){
            $name = $file->getClientOriginalName();
            $location = "imgs";
            $file->move($location , $name);
            $input['image_path'] = $name;
        }    
    
    
        Media::create($input);
        return redirect()->route('view.resource', $id)->with('message', 'Media updated');

    }

     public function destroy_media($id)
    {     
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->back()->with('message', 'Media deleted');
    }   




   public function create_article(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'article'=>'required',
        ]);

        $input = $request->all();
        if($file = $request->file('audio')){
            $name = $file->getClientOriginalName();
            $file->move('audio', $name);
            $input['audio'] = $name;
        }
        

    Article::create($input);
    return redirect()->route('view.resource', $id)->with('message', 'Article updated');

    }

     public function destroy_article($id)
    {     
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->back()->with('message', 'Article deleted');
    }   







    public function create_vocab(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'word'=>'required',
            'definition'=>'required',
        ]);

        $input = $request->all();
        if($file = $request->file('audio')){
            $name = $file->getClientOriginalName();
            $location = "audio/vocab";
            $file->move($location , $name);
            $input['audio'] = $name;
        }
        Vocabulary::create($input);

    return redirect()->route('view.resource', $id)->with('message', 'Vocabulary updated');

    }

     public function destroy_vocab($id)
    {     
        $vocabulary = Vocabulary::findOrFail($id);
        $vocabulary->delete();
        return redirect()->back()->with('message', 'Vocabulary deleted');
    }   



   public function create_question(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'question'=>'required',
        ]);

    $resource = Question::create($request->all());
    return redirect()->route('view.resource', $id)->with('message', 'Questions updated');

    }

     public function destroy_question($id)
    {     
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->back()->with('message', 'Question deleted');
    }   



   public function create_script(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'speaker'=>'required',
            'content'=>'required',
        ]);

    $resource = Script::create($request->all());
    return redirect()->route('view.resource', $id)->with('message', 'Script updated');

    }

     public function destroy_script($id)
    {     
        $script = Script::findOrFail($id);
        $script->delete();
        return redirect()->back()->with('message', 'Script line deleted');
    }   




   public function create_homework(Request $request, $id)
    {     
        $this->validate($request, [
            'resource_id'=>'required',
            'content'=>'required',
        ]);

    $resource = Homework::create($request->all());
    return redirect()->route('view.resource', $id)->with('message', 'Homework updated');

    }

     public function destroy_homework($id)
    {     
        $script = Homework::findOrFail($id);
        $script->delete();
        return redirect()->back()->with('message', 'Homework deleted');
    }   



}
