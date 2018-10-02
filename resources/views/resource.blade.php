@extends('layouts.app')

@section('content')


<div class="container">
<div class="row">

      @foreach($resources as $resource)
      @if($resource->is_public)
      <div class="col m4 s12">
      <a href="{{ route('resource.item', [$resource->level, $resource->id]) }}">
      <div class="card-panel card-hover">
        <div class="row bb-1 pb-1">
          <div class="col m12">
            <h5>{{ $resource->title }}</h5>
          </div>
          <div class="col m12">
            <i>{{ $resource->level }}</i>
          </div>
        </div>

        <div class="bb-1 pb-1">
          <div class="chip tooltipped" data-position="bottom" data-tooltip="Skill">{{ $resource->skill }}</div>

          <div class="chip tooltipped" data-position="bottom" data-tooltip="Category">{{ $resource->category }}</div>
        </div>
     
      <div class="row">
        <div class="col m6">
          <p><i class="tiny material-icons">star</i> {{ number_format($resource->avgRating(), 2) }} 
          </p>
        </div>
        <div class="col m6 right-align">
          <p><i class="tiny material-icons">access_time</i> {{ $resource->created_at->diffForHumans() }}</p>
        </div>
      </div>

      </div>
      </a>
      </div>
      @endif
      @endforeach 
</div>
</div>
<div class="row">
  {{ $resources->links() }}
</div>


@endsection

