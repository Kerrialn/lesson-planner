@extends('layouts.app')

@section('content')
@foreach($resources as $resource)
<div class="container">


<div class="fixed-action-btn">
  <a class="btn-floating btn-large red tooltipped"  data-position="left" data-tooltip="Download PDF" href="{{ route('download.pdf', $resource->id ) }}">
    <i class="large material-icons">picture_as_pdf</i>
  </a>
</div>

    <div class="row card-panel">
    <div class="row">
      <div class="col m6">
          <h5>  {{ $resource->title }} </h5>
          <span class="tooltipped" data-position="bottom" data-tooltip="Published by">  {{ $resource->user->name }} </span>
      </div>
      <div class="col m6 right-align">
           <i>  <span class="tooltipped" data-position="top" data-tooltip="Level">{{ $resource->level }}</span> / <span class="tooltipped" data-position="top" data-tooltip="Resource Category">{{ $resource->category }}</span> / <span class="tooltipped" data-position="top" data-tooltip="Title">{{ $resource->title }}</span></i>
      </div>
    </div>
   
   
 @if($resource->has_media)  
    @if(count($medias) > 0 )

      <div class="row">
        <div class="col m12 s12 center-align">

            @foreach($medias as $media) 
            @if( $media->media_path)
            <div class="videoWrapper">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $media->media_path }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            @endif
            @if( $media->media_path_fb)
            <div class="center-align">
                <iframe src="{{ $media->media_path_fb }}" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
            </div>
            @endif
            @if($media->image_path)
            <div class="col m12 s12">
                <img src="{{url('imgs/' . $media->image_path )}}" class="materialboxed" width="100%" >
            </div>
            @endif
            @if($media->caption)
            <ul class="collapsible">
              <li>
                <div class="collapsible-header"><i class="material-icons">closed_caption</i>Caption</div>
                <div class="collapsible-body">
                  <p class="content"> {{ $media->caption }} </p>
                </div>
              </li>
            </ul>
            @endif
            @endforeach
        
        </div>    
      </div>    

    @endif
  @endif

@php 
    $size = "col m6 s12";
@endphp




<div class="row"> 

  @if($resource->has_warmups) 
      @if(count($warm_ups) > 0 )
   
        <div class="{{ $size }}">
          <ul class="collection with-header">
            <li class="collection-header"><b>Warm up</b></li>
            @foreach($warm_ups as $warmup) 
              <li class="collection-item"> 
                <label>
                  <input type="checkbox" />
                  <span>{{ $warmup->content }}</span>
                </label>
               </li>
            @endforeach
          </ul>    
       </div>
        @endif
    @endif

  @if($resource->has_phrases) 
      @if(count($phrases) > 0 )

        <div class="{{ $size }}">
          <ul class="collection with-header">
            <li class="collection-header"><b>Expressions & Phrases</b></li>
            @foreach($phrases as $phrase) 
              <li class="collection-item">  
                <label>
                  <input type="checkbox" />
                    <span> {{ $phrase->phrase }} </span>
                </label>           
              </li>
              <li class="collection-item">
                <i>{{ $phrase->definition }}</i>
              </li>
            @endforeach
          </ul>    
       </div>
        @endif
    @endif








@if($resource->has_vocabulary) 
@if(count($vocabularies) > 0 )
<div class="{{ $size }}">
  <ul class="collection with-header">
  <li class="collection-header"><b>Vocabulary</b></li>  
    @foreach($vocabularies as $vocabulary)  
     <li class="collection-item">
      <a href="#!" class="secondary-content vocab-slide"><i class="material-icons">keyboard_arrow_down</i></a>
        <label>
          <input type="checkbox" />
            <span>{{ $vocabulary->word }} <i>{{ $vocabulary->phonetic_spelling }}</i></span> 
        </label>  
      </li>
      <div class="vocab-definition">
     <li class="collection-item"> <i>{{ $vocabulary->definition }}</i> </li>
     @if($vocabulary->audio)
      <li class="collection-item center-align">
        <audio
          controls
          src="/audio/vocab/{{ $vocabulary->audio }}">
          Your browser does not support the <code>audio</code> element.
        </audio>
      </li>  
      @endif
      </div>    
    @endforeach
  </ul>   
</div>
@endif
@endif

<script type="text/javascript">
  $(document).ready(function(){
    $('.vocab-slide').click(function(evt){
      evt.preventDefault();
      if($(this).hasClass('open')){
      $(this).children(":first").text('keyboard_arrow_down').css("color", "#9e9e9e");
      $(this).removeClass('open');
      $(this).parent().next('.vocab-definition').slideUp();
      }else{
      $(this).children(":first").text('keyboard_arrow_up').css("color", "#333"); 
      $(this).addClass('open');
      $(this).parent().next('.vocab-definition').slideDown();        
      }
    });
  });
</script>

</div>


 @if($resource->has_script)
        @if(count($scripts) > 0 )
        <div class="row">
          <div class="col m12">
            <h5>Script</h5>
          </div>
         <div class="col m12 script_holder">
          
          @foreach($scripts as $script) 

            <div class="script_outter">
              <div class="script tooltipped" data-position="bottom" data-tooltip="{{ $script->speaker }}" >
                {{ $script->content }}
              </div>
            </div>

          @endforeach
 
            </div> 
          </div> 
        @endif
   @endif

  @if($resource->has_article)
      @if(count($articles) > 0 )
      <div class="row">
        <div class="col m12">
        <ul class="collection with-header">
          <li class="collection-header"><b>Article</b>
          </li>

          @foreach($articles as $article) 
            <li class="collection-item content"> {{ $article->article }}</li>
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

        </ul>    
        </div>
      </div>
      @endif
  @endif


        @if($resource->has_questions)
          @if(count($questions) > 0 )
      <div class="row">
        <div class="col m12">
          <ul class="collection with-header">
            <li class="collection-header"><b>Questions</b></li>
            @php $count = 1; @endphp 
            @foreach($questions as $question) 
              <li class="collection-item"> <span class="count">{{ $count }}.</span>  {{ $question->question }}</li>
            @php $count++; @endphp 
            @endforeach
          </ul>
         </div> 
      </div> 
          @endif
          @endif


      @if($resource->has_exercises)
          @if(count($exercises) > 0 )
      <div class="row">
        <div class="col m12">
          <ul class="collection with-header">
            <li class="collection-header"><b>Exercises</b></li>
            @php $count = 1; @endphp 
            @foreach($exercises as $exercise) 
              <li class="collection-item"> {{ $count }}.  {{ $exercise->content }}</li>
            @php $count++; @endphp 
            @endforeach
          </ul>
        </div>
      </div>
          @endif
      @endif




@if($resource->has_wordsearch)
  @if(count($vocabularies) > 0 )
  <div class="row"> 
    <div class="col m12">
      <h5>Word search</h5>
    @php 

    $words = "";

    foreach($vocabularies as $v) { 

    $words .= $v->word.",";

    }
    $pieces = explode(",", $words);


    $puzzle = WordSearch\Factory::create($pieces);

    $transformer = new WordSearch\Transformer\HtmlTransformer($puzzle);
    echo $transformer->grid();
    echo $transformer->wordList();

    @endphp


    </div>
  </div>
  @endif
@endif



    </div>




@auth
@if($user_rating)


      <div class="row">
        <div class="col m12 right-align">
          <span class="tooltipped" data-position="top" data-tooltip="{{ $user_rating->created_at->diffForHumans() }}">you rated this resource: {{ $user_rating->rating }} / 5</span>
        </div>
      </div>

@else

    <div class="card-panel">
      <div class="row">
      <div class="col m8 offset-m2 center-align">
          <h5>Rate this resource</h5>
          <form method="post" action="{{ route('rate.resource', $resource->id )}}">
            @csrf
           <p>
            <label class="rating">
              <input name="user_id" type="hidden" value="{{ Auth::user()->id }}"  />
              <input name="resource_id" type="hidden" value="{{ $resource->id }}"  />
              <input class="" name="rating" type="radio" value="1"  />
              <span>1</span>
            </label>

            <label class="rating">
              <input class="" name="rating" type="radio"  value="2" />
              <span>2</span>
            </label>

            <label class="rating">
              <input class="" name="rating" type="radio"  value="3" />
              <span>3</span>
            </label>

            <label class="rating">
              <input class="" name="rating" type="radio"  value="4" />
              <span>4</span>
            </label>

            <label class="rating">
              <input class="" name="rating" type="radio"  value="5" />
              <span>5</span>
            </label>            
          </p>        
          <div class="right-align">
           <button type="submit" class="btn black">submit</button>
         </div>
          </form>
        </div>
      </div>
      </div>

@endif
@endauth


</div>
@endforeach
@endsection