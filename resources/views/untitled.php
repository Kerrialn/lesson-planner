@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row card-panel">
       

@foreach($resources as $resource)
<h5>  {{ $resource->title }} </h5>
<span>  {{ $resource->user->name }} </span>
@endforeach

  <div class="row">
    <div class="col m6 s12">
      <ul class="collection with-header">
        <li class="collection-header"><b>Warm up</b></li>
        @php $count = 1; @endphp 
        @foreach($warm_ups as $warmup) 
          <li class="collection-item"> {{ $count }}.  {{ $warmup->content }}</li>
        @php $count++; @endphp 
        @endforeach
      </ul>    
    </div>
    <div class="col m6 s12">
      <ul class="collection with-header">
        <li class="collection-header"><b>Vocabulary</b></li>
        @php $count = 1; @endphp 
        @foreach($vocabularies as $vocabulary) 
          <li class="collection-item">{{ $count }}. <span class="tooltipped" data-position="bottom" data-tooltip="{{ $vocabulary->definition }}">{{ $vocabulary->content }}</span> </li>
        @php $count++; @endphp 
        @endforeach
      </ul>
    </div>
  </div> 

<ul class="collection with-header">
  <li class="collection-header"><b>Article</b>
  </li>

  @foreach($articles as $article) 
    <li class="collection-item content"> {{ $article->content }}</li>
  @if($article->audio != '')
  <li class="collection-item center-align"> 
    <audio
        id="t-rex-roar"
        controls
        src="{{ $article->audio }}">
        Your browser does not support the <code>audio</code> element.
    </audio>
  </li>
  @endif

  @endforeach

</ul>


    <ul class="collection with-header">
      <li class="collection-header"><b>Questions</b></li>
      @php $count = 1; @endphp 
      @foreach($questions as $question) 
        <li class="collection-item"> {{ $count }}.  {{ $question->question }}</li>
      @php $count++; @endphp 
      @endforeach
    </ul>

    <ul class="collection with-header">
      <li class="collection-header"><b>Exercises</b></li>
      @php $count = 1; @endphp 
      @foreach($exercises as $exercise) 
        <li class="collection-item"> {{ $count }}.  {{ $exercise->content }}</li>
      @php $count++; @endphp 
      @endforeach
    </ul>


{{ $articles }}
{{ $warm_ups }}
{{ $questions }}
{{ $exercises }}
{{ $vocabularies }}

    </div>
</div>
@endsection