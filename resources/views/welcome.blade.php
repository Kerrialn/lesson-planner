@extends('layouts.app')

@section('content')



<div class="row">
<div class="col m9">

    <div class="row">
        <div class="col m8 offset-m2 s12">
                 <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input autofocus type="text" name="title" id="search-input" autocomplete="off" placeholder="Search Resources">
            <label for="search-input"></label>
        </div>
        </div>
    </div>

    
@php
$input_array = array("gp-1.png", "gp-2.png", "gp-3.png", "gp-4.png", "gp-5.png", "gp-6.png");
@endphp
 
      <div class="row" id="search_results" >
      @foreach($results as $result)
      @if($result->is_public)
     <div class="col m6 s12">
    <a class="nolink" href="{{ route('resource.item', [$result->level, $result->id]) }}">
      <div class="card">
        <div class="card-image">
            @php $geo_image = $input_array[rand(0,sizeof($input_array)-1)]; @endphp
            <img src="imgs/{{ $geo_image }}">
            <span class="card-title">
                <h5 class="">{{ $result->title }}</h5>
                <small><i>{{ $result->level }}</i></small>
            </span>
        </div>
        <div class="card-content">
          <p>
<div class="chip tooltipped" data-position="bottom" data-tooltip="Skill">{{ $result->skill }}</div>

          @if($result->has_vocabulary)
          <div class="chip ">Vocabulary</div>
          @endif

          @if($result->has_phrases)
          <div class="chip ">Phrases</div>
          @endif

          @if($result->has_warmups)
          <div class="chip ">Warm ups</div>
          @endif

          @if($result->has_article)
          <div class="chip ">Article</div>
          @endif

          @if($result->has_questions)
          <div class="chip ">Questions</div>
          @endif

          @if($result->has_media)
          <div class="chip ">Media</div>
          @endif

          @if($result->has_script)
          <div class="chip ">Script</div>
          @endif

          @if($result->has_homework)
          <div class="chip ">Homework</div>
          @endif        
        </p>
        </div>
        <div class="card-action">
            <div class="row m-0">
                <div class="col m6 s6">
                    <span><i class="tiny material-icons">star</i> {{ number_format($result->avgRating(), 2) }}</span>
                </div>
                <div class="col m6 s6 right-align">
                    <span>{{ $result->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
      </div>
   </a>
   </div>
      @endif
      @endforeach 
        
    </div>





</div>
<div class="col m3"></div>
</div>


    <script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#search-input").keyup(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/search',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, search: $("#search-input").val(), },
                    
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                         
                             $('#search_results').html(data);

                    }
                }); 
            });
       });    
    </script>



@endsection
