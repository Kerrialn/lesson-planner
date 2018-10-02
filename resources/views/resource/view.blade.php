@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


        <div class="col m12 s12">
            <div class="card-panel">
                <div class="row">
                  <div class="col m6 center-align">
                    <h6>Modify resource</h6>
                  </div>
                    <div class="col m6 right-align">
                         <i>  <span class="tooltipped" data-position="top" data-tooltip="Level">{{ $resource->level }}</span> / <span class="tooltipped" data-position="top" data-tooltip="Resource Category">{{ $resource->category }}</span> / <span class="tooltipped" data-position="top" data-tooltip="Title">{{ $resource->title }}</span></i>
                    </div>
                </div>
     
          

                <div class="row">
                  <div class="col m4 s12">

                    <ul class="collection">
                    <form method="POST" action="{{ route('update.resource', $resource->id) }}">
                     @csrf

                      <li class="collection-item">
                        <div class="input-field">
                          <input placeholder="Title" id="resource_title" name="title" type="text" class="validate" value="{{ $resource->title }}">
                          <label for="resource_title">Title</label>
                        </div>
                      </li>


                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Public </p>
                          <label>
                            hidden
                            <input type="hidden" name="is_public" value="0">
                            <input type="checkbox" name="is_public" @if($resource->is_public) checked @endif >
                            <p class="lever"> </p>
                            visible
                          </label>
                        </div>
                      </li>


                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Warm ups </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_warmups" value="0">
                            <input type="checkbox" name="has_warmups" @if($resource->has_warmups) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>

                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Media </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_media" value="0">
                            <input type="checkbox" name="has_media" @if($resource->has_media) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>

                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Article </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_article" value="0">
                            <input type="checkbox" name="has_article" @if($resource->has_article) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>

                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Vocabulary </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_vocabulary" value="0">
                            <input type="checkbox" name="has_vocabulary" @if($resource->has_vocabulary) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>

                      <li class="collection-item center-align">
                      <div class="switch">
                        <p> Phrases </p>
                        <label>
                          disabled
                          <input type="hidden" name="has_phrases" value="0">
                          <input type="checkbox" name="has_phrases" @if($resource->has_phrases) checked @endif >
                          <p class="lever"> </p>
                          Enabled
                        </label>
                      </div>
                     </li>

                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Questions </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_questions" value="0">
                            <input type="checkbox" name="has_questions" @if($resource->has_questions) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>
                    

                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Script </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_script" value="0">
                            <input type="checkbox" name="has_script" @if($resource->has_script) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>

                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Wordsearch </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_wordsearch" value="0">
                            <input type="checkbox" name="has_wordsearch" @if($resource->has_wordsearch) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>

                      <li class="collection-item center-align">
                        <div class="switch">
                          <p> Homework </p>
                          <label>
                            disabled
                            <input type="hidden" name="has_homework" value="0">
                            <input type="checkbox" name="has_homework" @if($resource->has_homework) checked @endif >
                            <p class="lever"> </p>
                            Enabled
                          </label>
                        </div>
                      </li>

                     <li class="collection-item center-align">
                       <button type="submit" class="btn grey w-100">save</button>
                     </li>
                   </form>

                    </ul>
                  </div>
                  <div class="col m8 s12">

<ul class="collapsible">
@if($resource->has_warmups || $resource->has_phrases || $resource->has_media || $resource->has_article || $resource->has_vocabulary || $resource->has_questions || $resource->has_script || $resource->has_exercises ||  $resource->has_homework)
@else
<li>
   <div class="collapsible-header center-align">No section added</div>
</li>
@endif



@if($resource->has_warmups)
  <li>
    <div class="collapsible-header">Warm ups</div>
    <div class="collapsible-body">
      <ul class="collection">
      @if(count($warm_ups) > 0)
        @foreach($warm_ups as $warm_up)
          <li class="collection-item">
            <form method="POST" action="{{ route('warmup.destroy', $warm_up->id) }}">
               @csrf
            <a href="#!" class="secondary-content trash"><i class="material-icons">delete</i></a>
            </form>
            <span>{{ $warm_up->content }}</span>
          </li>
        @endforeach
        @endif
        <li class="collection-item">
          <form method="POST" action="{{ route('new.warmup', $resource->id) }}">
            @csrf
          <div class="input-field">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <input type="hidden" hidden name="img_path" value="0">
            <input placeholder="warm up" id="warm_up" name="content" type="text" class="validate">
            <label for="warm_up">Warm up</label>
          </div>
            <div class="right-align">
            <button class="btn grey">add</button>
          </div>  
          </form>                          
        </li>
      </ul>
    </div>
  </li>
@endif

@if($resource->has_phrases)
  <li>
    <div class="collapsible-header">Phrases</div>
    <div class="collapsible-body">
      <ul class="collection">
      @if(count($phrases) > 0)
        @foreach($phrases as $phrase)
          <li class="collection-item">
            <form method="POST" action="{{ route('phrase.destroy', $phrase->id) }}">
               @csrf
            <a href="#!" class="secondary-content trash"><i class="material-icons">delete</i></a>
            </form>

            <span class="tooltipped" data-position="top" data-tooltip="{{ $phrase->definition }}">{{ $phrase->phrase }}</span>
          </li>
        @endforeach
        @endif
        <li class="collection-item">
        <form method="POST" action="{{ route('new.phrase', $resource->id) }}" enctype="multipart/form-data">
            @csrf  

          <div class="input-field">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <input placeholder="phrase" id="phrase" name="phrase" type="text" class="validate">
            <label for="phrase">Phrase</label>
          </div>

          <div class="input-field">
            <input placeholder="definition" id="definition" name="definition" type="text" class="validate">
            <label for="definition">Phrase definition</label>
          </div>

          <div class="file-field input-field">
            <div class="btn">
              <span>Pronunciation</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" name="audio" placeholder="Upload the phrase pronunciation">
            </div>
          </div>

            <div class="right-align">
            <button class="btn grey">add</button>
          </div>  
          </form>                          
        </li>
      </ul>
    </div>
  </li>
@endif



@if($resource->has_media)
  <li>
    <div class="collapsible-header">Media</div>
    <div class="collapsible-body">
      <ul class="collection">
      @if(count($medias) > 0)
        @foreach($medias as $media)
        @if($media->media_path)
          <li class="collection-item">
            <div class="videoWrapper">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $media->media_path }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
          </li>
          @endif
          @if($media->media_path_fb)
          <li class="center-align"> 
            <iframe src="{{ $media->media_path_fb }}" width="476" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
          </li>
          @endif
          @if($media->image_path)
          <li> 
            <img src="{{url('imgs/' . $media->image_path )}}" class="materialboxed" width="100%" >
          </li>
           @endif
          <li>
            <div class="center-align p-1">
              <form method="POST" action="{{ route('media.destroy', $media->id) }}">
               @csrf
                <a class="btn red trash" href="#!">Delete Media</a>
              </form>
            </div>              
          </li>
        @endforeach
        @endif
        <li class="collection-item">

        <form method="POST" action="{{ route('new.media', $resource->id) }}" enctype="multipart/form-data">
            @csrf  
          <div class="input-field col m6">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <input placeholder="Youtube link" id="media_path" name="media_path" type="text" class="validate">
            <label for="media_path">Youtube link</label>
          </div>
     
          <div class="input-field col m6">
            <input placeholder="Facebook embed link" id="media_path_fb" name="media_path_fb" type="text" class="validate">
            <label for="media_path_fb">Facebook embed link</label>
          </div>     
          
          <div class="file-field input-field col m12">
            <div class="btn">
              <span>Image</span>
              <input type="file" accept="image/*" name="image_path">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" name="img-path" type="text">
            </div>
          </div>

          <div class="input-field col m12">
            <input placeholder="Media caption" id="caption" name="caption" type="text" class="validate">
            <label for="caption">caption</label>
          </div>


            <div class="right-align">
            <button class="btn grey">add</button>
          </div>   
        </form>

        </li>
      </ul>
    </div>
  </li>
@endif

@if($resource->has_article)
  <li>
    <div class="collapsible-header">Article</div>
    <div class="collapsible-body">
      <ul class="collection">
      @if(count($articles) > 0)
        @foreach($articles as $article)
          <li class="collection-item">
          <form method="POST" action="{{ route('article.destroy', $article->id) }}">
          @csrf
            <a href="#!" class="secondary-content trash"><i class="material-icons">delete</i></a>
          </form>
            <span class="content">{{ $article->article }}</span>
          </li>
          @if($article->audio)
          <li class="collection-item center-align"> 
            <audio
                id="article-audio"
                controls
                src="/audio/{{ $article->audio }}">
                Your browser does not support the <code>audio</code> element.
            </audio>
          </li>
          @endif          
          
        @endforeach
        @endif
        <li class="collection-item">
        <form method="POST" action="{{ route('new.article', $resource->id) }}"  enctype="multipart/form-data">
            @csrf  
          <div class="input-field">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <textarea id="textarea1" name="article" class="materialize-textarea"></textarea>
            <label for="textarea1">Article</label>
          </div>

          <div class="file-field input-field">
            <div class="btn">
              <span>Audio</span>
              <input type="file" name="audio">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" name="audio_path" type="text">
            </div>
          </div>

            <div class="right-align">
            <button class="btn grey">add</button>
          </div>  
          </form>                          
        </li>
      </ul>
    </div>
  </li>
@endif

@if($resource->has_vocabulary)
  <li>
    <div class="collapsible-header">Vocabulary</div>
    <div class="collapsible-body">
      <ul class="collection">
       @if(count($vocabularies) > 0)

 @foreach($vocabularies as $vocabulary) 
              <li class="collection-item">
                <form method="POST" action="{{ route('vocab.destroy', $vocabulary->id) }}">
                @csrf
                  <a href="#!" class="secondary-content trash"><i class="material-icons">delete</i></a>
              </form>
                <div class="count"></div> <span class="tooltipped" data-position="bottom" data-tooltip="{{ $vocabulary->definition }}">{{ $vocabulary->word }} <i>{{ $vocabulary->phonetic_spelling }}</i></span> 
    
              </li>
              <li class="collection-item center-align"> 
              <i>{{ $vocabulary->definition }}</i>
              </li>
          @if($vocabulary->audio)
          <li class="collection-item center-align"> 
            <audio
                id="article-audio"
                controls
                src="/audio/vocab/{{ $vocabulary->audio }}">
                Your browser does not support the <code>audio</code> element.
            </audio>
          </li>
          @endif                
              
            @endforeach
        @endif
        <li class="collection-item">
        <form method="POST" action="{{ route('new.vocab', $resource->id) }}" enctype="multipart/form-data">
            @csrf  

          <div class="input-field">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <input placeholder="Word" id="Word" name="word" type="text" class="validate">
            <label for="Word">Word</label>
          </div>

          <div class="input-field">
            <input placeholder="phonetic spelling" id="phonetic" name="phonetic_spelling" type="text" class="validate">
            <label for="phonetic">Phonetic spelling</label>
          </div>

         <div class="input-field">
            <input placeholder="word definition" id="vocab_definition" name="definition" type="text" class="validate">
            <label for="vocab_definition">Definition</label>
          </div>

          <div class="file-field input-field">
            <div class="btn">
              <span>Audio</span>
              <input type="file" name="audio">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" name="audio" type="text">
            </div>
          </div>

            <div class="right-align">
            <button class="btn grey">add</button>
          </div>  
          </form>                          
        </li>
      </ul>
    </div>
  </li>
@endif

@if($resource->has_wordsearch)
@if($resource->has_vocabulary)


  <li>
    <div class="collapsible-header">Word search</div>
    <div class="collapsible-body">
      <ul class="collection with-header">
        <li class="collection-item">
          <p>A word search is automaticlly being generated using the vocabulary list</p>
        </li>
      </ul>
    </div>
  </li>

@else

  <li>
    <div class="collapsible-header">Word search</div>
    <div class="collapsible-body">
      <ul class="collection with-header">
        <li class="collection-item">
          <p>To automaticlly generate a word search please enable the vocabulary switch on the resource panel and add some word</p>
        </li>
      </ul>
    </div>
  </li>


@endif
@endif



@if($resource->has_questions)
  <li>
    <div class="collapsible-header">Questions</div>
    <div class="collapsible-body">
      <ul class="collection">
        @if(count($questions) > 0)
        @foreach($questions as $question)
          <li class="collection-item">
            <form method="POST" action="{{ route('question.destroy', $question->id) }}">
             @csrf
              <a href="#!" class="secondary-content trash"><i class="material-icons">delete</i></a>
            </form>

            <span>{{ $question->question }}</span>
          </li>
        @endforeach
        @endif
        <li class="collection-item">
        <form method="POST" action="{{ route('new.question', $resource->id) }}">
            @csrf            
          <div class="input-field">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <input placeholder="question" id="question" name="question" type="text" class="validate">
            <label for="question">Question</label>
          </div>
            <div class="right-align">
            <button class="btn grey">add</button>
          </div>  
          </form>                          
        </li>
      </ul>
    </div>
  </li>
@endif


@if($resource->has_script)
  <li>
    <div class="collapsible-header">Script</div>
    <div class="collapsible-body">
      <ul class="collection">
        @if(count($scripts) > 0)
        @foreach($scripts as $script)
          <li class="collection-item">
            <form method="POST" action="{{ route('script.destroy', $script->id) }}">
             @csrf
              <a href="#!" class="secondary-content trash"><i class="material-icons">delete</i></a>
            </form>
              {{ $script->speaker }}</span>
            <span>{{ $script->content }}</span>
          </li>
        @endforeach
        @endif
        <li class="collection-item">
        <form method="POST" action="{{ route('new.script', $resource->id) }}">
            @csrf      
          <div class="input-field">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <input placeholder="Line" id="Line" name="content" type="text" class="validate">
            <label for="Line">script line</label>
          </div>

          <div class="input-field">
            <input placeholder="Name of the speaker" id="speaker" name="speaker" type="text" class="validate">
            <label for="speaker">Name of the speaker</label>
          </div>



            <div class="right-align">
            <button class="btn grey">add</button>
          </div> 
          </form>                           
        </li>
      </ul>
    </div>
  </li>
@endif



@if($resource->has_homework)
  <li>
    <div class="collapsible-header">Homework</div>
    <div class="collapsible-body">
      <ul class="collection">
      @if(count($homeworks) > 0)
        @foreach($homeworks as $homework)
          <li class="collection-item">
            <form method="POST" action="{{ route('homework.destroy', $homework->id) }}">
             @csrf
              <a href="#!" class="secondary-content trash"><i class="material-icons">delete</i></a>
            </form>
            <span>{{ $homework->content }}</span>
          </li>
        @endforeach
        @endif
        <li class="collection-item">
        <form method="POST" action="{{ route('new.homework', $resource->id) }}">
            @csrf   
          <div class="input-field">
            <input type="hidden" hidden name="resource_id" value="{{ $resource->id }}">
            <input placeholder="homework" id="homework" name="content" type="text" class="validate">
            <label for="homework">homework</label>
          </div>
            <div class="right-align">
            <button class="btn grey">add</button>
          </div>   
          </form>                         
        </li>
      </ul>
    </div>
  </li>
@endif


</ul>


                  <form method="POST" action="{{ route('destroy.resource', $resource->id) }}">
                    @csrf
                    <div style="left:23px!important;" class="fixed-action-btn"> 
                      <button  onclick="return confirm('Are you sure you want to delete this resource?')" data-position="right" data-tooltip="delete {{ $resource->title }}"  type="submit" class="btn-floating btn-large waves-effect waves-light red tooltipped"><i class="material-icons">delete</i></button>
                    </div>
                  </form>



                  </div>
                  </div>
                </div>


            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){    
  $('.trash').click(function(e){
      e.preventDefault();
      $(this).closest('form').submit();
  });  
});  
</script>

<script type="text/javascript">

$(document).ready(function(){  
  $('input[type=checkbox').change(function(){
      if($(this).is(':checked')){
          $(this).val('on');
      } else {
          $(this).val('off');
      }
  });
});
</script>

@endsection
