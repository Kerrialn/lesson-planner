@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m12 s12">
            <div class="row">
                <div class="col m6">
                    <h5>Your Resources</h5>
                </div>
                <div class="col m6 right-align">
                    <a href="{{  route('new.resource') }}" class="btn-floating btn-large waves-effect waves-light blue-grey tooltipped" data-position="left" data-tooltip="Create resource"><i class="material-icons">add</i></a>
                </div>
            </div>



      <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Level</th>
              <th>Category</th>
              <th>Skill</th>
              <th>Created</th>
              <th>Public</th>
              <th></th>
          </tr>
        </thead>

        <tbody>


@forelse ($resources as $resource)
          <tr>
            <td>{{ $resource->title }}</td>
            <td>{{ $resource->level }}</td>
            <td>{{ $resource->category }}</td>
            <td>{{ $resource->skill }}</td>
            <td>{{ $resource->created_at->diffForHumans() }}</td>
            <td>  @if($resource->is_public)  <i class="material-icons">check</i> @else <i class="material-icons">close</i>  @endif   </td>
            <td> <a class="tooltipped" data-position="left" data-tooltip="Modify {{ $resource->title }}" href="{{ route('view.resource', $resource->id) }}"><i class="material-icons">arrow_forward</i></a></td>
          </tr>
@empty
    <tr>
      <td></td>
      <td></td>
      <td>Nothing found</td>
      <td></td>
      <td></td>
    </tr>
@endforelse



        </tbody>
      </table>
            




        </div>
    </div>
    <div class="row">
        {{ $resources->links() }}
    </div>
</div>


@endsection
