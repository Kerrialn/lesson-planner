<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style type="text/css">
  *{
    font-family: 'Open Sans', sans-serif;
  }
 .w-100{width:100%;}   
 .w-50{width:100%;display: inline-block;}   
 table{width:80%;margin: 0 auto;}
 td {border-bottom: 1px solid #eee;padding:5px 0px}
 .location{text-align:right;}
 .w-30{width:30%;display:inline;}
 .top{background-color: #263238 !important;color:#fff;padding:10px;text-align:center;}

  </style>

  <body>
<div class="top">
  <h3>lesson-planner.org</h3>
</div>


@foreach($resources as $resource)
        <table>
          <tbody>
              <tr>
                <td width="30%">
                  <h3> {{ $resource->title }} </h3> 
                </td>
                <td width="70%">
          <div class="location">
           <i>  <small class="tooltipped" data-position="top" data-tooltip="Level">{{ $resource->level }}</span> / <span class="tooltipped" data-position="top" data-tooltip="Resource Category">{{ $resource->category }}</span> / <span class="tooltipped" data-position="top" data-tooltip="Title">{{ $resource->title }}</small></i>
         </div>                  
                </td>
              </tr>
          </tbody>
        </table>

   

@php 
    $size = "col m12 s12";
    $count = 1;
@endphp


  @if($resource->has_media) 
      @if(count($medias) > 0 )
      
      @foreach($medias as $media) 
      @if($media->image_path)
      <div style="width:80%;margin: 0 auto;">
      <img src="{{url('imgs/' . $media->image_path )}}" class="materialboxed" width="100%" >
      </div>
      @endif
      @endforeach
      
      @endif 
  @endif



  @if($resource->has_warmups) 
      @if(count($warm_ups) > 0 )
          <table>
        <thead>
          <tr>
              <th><h3>Warm up</h3> </th>
          </tr>
        </thead>
          <tbody>
            @foreach($warm_ups as $warmup) 
              <tr>
                <td>{{ $count }}.</td>
                <td>{{ $warmup->content }}</td>
              </tr>
              @php 
              $count++;
              @endphp
            @endforeach
          </tbody>
        </table>
        @endif
    @endif




  @if($resource->has_vocabulary) 
    @if(count($vocabularies) > 0 )
        <table>
        <thead>
          <tr>
              <th><h3>Vocabulary</h3> </th>
          </tr>
        </thead>
          <tbody>
            @foreach($vocabularies as $vocabulary)  
              <tr>
                <td><b>{{ $vocabulary->word }}</b></td>
                <td><i>{{ $vocabulary->definition }}</i></td>
              </tr>
            @endforeach
          </tbody>
        </table>
    @endif
  @endif



  @if($resource->has_phrases) 
      @if(count($phrases) > 0 ) 
      <table>
        <thead>
          <tr>
              <th><h3>Expressions & Phrases</h3></th>
          </tr>
        </thead>
        <tbody>
          @foreach($phrases as $phrase) 
            <tr>
              <td><b>{{  $phrase->phrase }}</b></td>
              <td><i>{{ $phrase->definition }}</i></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    @endif




 @if($resource->has_script)
        @if(count($scripts) > 0 )
      <table>
        <thead>
          <tr>
              <th><h3>Script</h3></th>
          </tr>
        </thead>
        <tbody>
          @foreach($scripts as $script) 
            <tr>
              <td><b>{{ $script->speaker }}:</b> {{ $script->content }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
        @endif
   @endif


  @if($resource->has_article)
      @if(count($articles) > 0 )
       <table>
            <thead>
              <tr>
                  <th><h3>Article</h3></th>
              </tr>
            </thead>
        </table>
        
          @foreach($articles as $article) 
        
              <p style="width:80%;margin: 0 auto;">{{ $article->article }} </p>
           
          @endforeach
   
     
      @endif
  @endif


  @if($resource->has_questions)
    @if(count($questions) > 0 )
    @php $que = 1; @endphp 
       <table>
        <thead>
          <tr>
              <th><h3>Questions</h3></th>
          </tr>
        </thead>
        <tbody>
          @foreach($questions as $question) 
            <tr>
              <td>{{ $que }}. </td>
              <td>{{ $question->question }} </td>
            </tr>
            @php $que++; @endphp 
          @endforeach
        </tbody>
      </table>
    @endif
  @endif


      @if($resource->has_exercises)
          @if(count($exercises) > 0 )
          <table>
            <thead>
              <tr>
                  <th><h3>Exercises</h3></th>
              </tr>
            </thead>
            <tbody>
                @php $exc = 1; @endphp 
                @foreach($exercises as $exercise) 
                <tr>
                  <td>{{ $exc }}.</td>
                  <td><b>{{ $exercise->content }}</td>
                </tr>
                @php $exc++; @endphp 
              @endforeach
            </tbody>
          </table>    
          @endif
      @endif




@if($resource->has_wordsearch)
  @if(count($vocabularies) > 0 )
    <div class="w-100">
      <table>
        <thead>
          <tr>
              <th><h3>Word search</h3></th>
          </tr>
        </thead>      
      </table>
    @php 

    $words = "";

    foreach($vocabularies as $v) { 

    $words .= $v->word.",";

    }
    $pieces = explode(",", $words);


    $puzzle = WordSearch\Factory::create($pieces);

    $transformer = new WordSearch\Transformer\HtmlTransformer($puzzle);
    echo $transformer->grid();
    echo '<div class="w-30">' . $transformer->wordList() . '</div>';

    @endphp


    </div>
  @endif
@endif


@endforeach



  @if($resource->has_media) 
      @if(count($medias) > 0 )
      
      @foreach($medias as $media) 
      @if($media->media_path)
      <div style="width:80%;margin: 0 auto;">
      <h3>Media</h3>
      <h5>https://www.youtube.com/watch?v={{ $media->media_path }}</h5>
      <p><b>Caption</b></p>
      <p style="white-space:pre-line;">{{ $media->caption }}</p>
      </div>
      @endif
      @endforeach
      
      @endif 
  @endif




<div style="color:#ccc;position:absolute;bottom:15px;margin:0 auto;text-align:center;right:0;left:0;">
<small">Provided by www.lesson-planner.org</small>
</div>


  </body>
</html>

